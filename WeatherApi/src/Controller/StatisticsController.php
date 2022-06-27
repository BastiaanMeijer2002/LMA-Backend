<?php

namespace App\Controller;

use App\Entity\WeatherData;
use Doctrine\Persistence\ManagerRegistry;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/statistics', name: 'app_statistics')]
class StatisticsController extends AbstractController
{
    private \Doctrine\Persistence\ObjectRepository $repository;

    public function __construct(private ManagerRegistry $doctrine) {
        $this->repository = $doctrine->getRepository(WeatherData::class);}

    #[Route('/{measurement_unit}/{order}/{date_start}/{date_end}/{amount}', name: 'statistic')]
    public function index($measurement_unit, $order, $date_start, $date_end, $amount): Response
    {
        $data = $this->repository->getStatistics($measurement_unit,$order,$date_start,$date_end,$amount);

        return $this->json($data);
    }
}
