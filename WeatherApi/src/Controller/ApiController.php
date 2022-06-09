<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\WeatherData;
use Doctrine\Persistence\ManagerRegistry;


/**
 * @Route("/api", name="api_")
 */
class ApiController extends AbstractController
{
    public function __construct(private ManagerRegistry $doctrine) {}

    /**
     * @Route("/live/{geolocation}", name="live", methods={"GET"})
     */
    public function show(int $geolocation): Response
    {
        $project = $this->doctrine
            ->getRepository(WeatherData::class)
            ->findOneBy(['geolocation'=>$geolocation], ['date'=>'DESC']);

        if (!$project) {

            return $this->json('No data found for ' . $geolocation, 404);
        }

        $data =  [
            'id' => $project->getId(),
            'geolocation' => $project->getGeolocation(),
            'date' => $project->getDate(),
            'time' => $project->getTime(),
            'temperature' => $project->getTemperature(),
            'wind-speed' => $project->getWindspeed(),
            'wind-direction' => $project->getWindDirection(),
            'rain' => $project->getRainfall()
        ];

        return $this->json($data);
    }

}


