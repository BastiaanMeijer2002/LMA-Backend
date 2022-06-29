<?php

namespace App\Controller;

use App\Entity\WeatherData;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/analytics', name: 'app_analytics')]
class AnalyticsController extends AbstractController
{
    public function __construct(private ManagerRegistry $doctrine) {$this->repository = $doctrine->getRepository(WeatherData::class);}

    #[Route('/days/{station}/{days}', name: 'app_analytics', methods: "GET")]
    public function index(int $station, int $days): Response
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT geolocation, date, AVG(wind_speed), AVG(rainfall)
            FROM weather_data 
            WHERE geolocation = :station
            GROUP BY date
            order by date DESC
            LIMIT :days
        ';

        $stmt = $conn->prepare($sql);

        $resultSet = $stmt->executeQuery(['station' => $station,
                                          'days' => $days]);

        return $this->json($resultSet->fetchAllAssociative());
    }
}
