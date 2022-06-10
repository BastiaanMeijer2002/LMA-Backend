<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\WeatherData;
use Symfony\Component\Validator\Constraints\DateTime;

#[Route('/compare', name: 'app_compare')]
class CompareController extends AbstractController
{
    private $repository;

    public function __construct(private ManagerRegistry $doctrine) {$this->repository = $doctrine->getRepository(WeatherData::class);}

    #[Route('/station/{station1}/{station2}/', name: 'app_compare_station',methods: "GET")]
    public function station(int $station1, int $station2,): Response
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

    /**
     * @throws \Exception
     */
    #[Route('/station/{station1}/{station2}/{date}', name: 'app_compare_station_date',methods: "GET")]
    public function stationDate(int $station1, int $station2, $date): Response
    {
        $date = new \DateTime($date);

        $station1 = $this->repository->findBy(
            [
                'geolocation'=>$station1,
                'date'=>$date
            ],
            ['date'=>'DESC']
        );

        $station2 = $this->repository->findBy(
            [
                'geolocation'=>$station2,
                'date'=>$date
            ],
            ['date'=>'DESC']
        );

        $data = [
            'station1'=>$station1,
            'station2'=>$station2
        ];

        return $this->json($data);
    }

    /**
     * @throws \Exception
     */
    #[Route('/station/{station1}/{station2}/time/{time}', name: 'app_compare_station_time',methods: "GET")]
    public function stationTime(int $station1, int $station2, string $time): Response
    {

        $time = new \DateTime($time);

        $station1 = $this->repository->findBy(
            [
                'geolocation'=>$station1,
                'time'=>$time
            ],
            ['date'=>'DESC']
        );

        $station2 = $this->repository->findBy(
            [
                'geolocation'=>$station2,
                'time'=>$time
            ],
            ['date'=>'DESC']
        );

        $data = [
            'station1'=>$station1,
            'station2'=>$station2,
        ];

        return $this->json($data);
    }

    /**
     * @throws \Exception
     */
    #[Route('/{station}/time/{time1}/{time2}', name: 'app_compare_time',methods: "GET")]
    public function timeCompare(int $station, string $time1, string $time2): Response
    {
        $time1 = new \DateTime($time1);
        $time2 = new \DateTime($time2);

        $time1 = $this->repository->findOneBy(
            [
                'geolocation'=>$station,
                'time'=>$time1
            ]
        );

        $time2 = $this->repository->findOneBy(
            [
                'geolocation'=>$station,
                'time'=>$time2
            ]
        );

        $data = [
            'time1'=>$time1,
            'time2'=>$time2
        ];

        return $this->json($data);



    }

    /**
     * @throws \Exception
     */
    #[Route('/{station}/date/{date1}/{date2}', name: 'app_compare_date',methods: "GET")]
    public function dateCompare(int $station, string $date1, string $date2): Response
    {
        $date1 = new \DateTime($date1);
        $date2 = new \DateTime($date2);

        $date1 = $this->repository->findBy(
            [
                'geolocation'=>$station,
                'date'=>$date1
            ]
        );

        $date2 = $this->repository->findBy(
            [
                'geolocation'=>$station,
                'date'=>$date2
            ]
        );

        $data = [
            'time1'=>$date1,
            'time2'=>$date2
        ];

        return $this->json($data);



    }
}
