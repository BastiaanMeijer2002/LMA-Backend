<?php

namespace App\Controller;

use App\Entity\WeatherData;
use Doctrine\Persistence\ManagerRegistry;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HistoricalController extends AbstractController
{
    public function __construct(private ManagerRegistry $doctrine) {$this->repository = $doctrine->getRepository(WeatherData::class);}

    /**
     * @throws \Exception
     */
    #[Route('/historical/{station}/{date}', name: 'app_historical')]
    public function historicalDate(string $station, string $date): Response
    {
        $date = new \DateTime($date);

        $station = $this->repository->findBy(
            [
                'geolocation'=>$station,
                'date'=>$date
            ]
        );

        return $this->json($station);
    }
}
