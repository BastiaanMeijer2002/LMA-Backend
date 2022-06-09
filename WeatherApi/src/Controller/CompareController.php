<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\WeatherData;

#[Route('/compare', name: 'app_compare')]
class CompareController extends AbstractController
{
    private $repository;

    public function __construct(private ManagerRegistry $doctrine) {$this->repository = $doctrine->getRepository(WeatherData::class);}

    #[Route('/station/{station1}/{station2}', name: 'app_compare_station',methods: "GET")]
    public function index(int $station1, int $station2): Response
    {
        $station1 = $this->repository->findBy(
            ['geolocation'=>$station1],
            ['date'=>'DESC']
        );

        $station2 = $this->repository->findBy(
            ['geolocation'=>$station2],
            ['date'=>'DESC']
        );

        $data = [
            'station1'=>$station1,
            'station2'=>$station2
        ];

        return $this->json($data);
    }
}
