<?php

namespace App\Controller;

use App\Entity\Geolocation;
use Doctrine\Persistence\ManagerRegistry;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/geolocation', name: 'app_geolocation')]
class GeolocationInfoController extends AbstractController
{
    private \Doctrine\Persistence\ObjectRepository $repository;

    public function __construct(private ManagerRegistry $doctrine) {$this->repository = $doctrine->getRepository(Geolocation::class);}

    #[Route('/info/{id}', name: 'app_station_info', methods: "GET")]
    public function geolocationInfo(int $id): Response
    {
        $station = $this->repository->find($id);

        return $this->json($station);

    }

    #[Route('/id/{place}', name: 'app_geolocation_id', methods: "GET")]
    public function geolocationId(string $place): Response
    {
        $location = $this->repository->findOneBy([
            'island' => $place
        ]);

        if(!$location){
            $location = $this->repository->findOneBy([
                'county' => $place
            ]);
        }

        if(!$location){
            $location = $this->repository->findOneBy([
                'place' => $place
            ]);
        }

        if(!$location){
            $location = $this->repository->findOneBy([
                'hamlet' => $place
            ]);
        }

        if(!$location){
            $location = $this->repository->findOneBy([
                'town' => $place
            ]);
        }

        if(!$location){
            $location = $this->repository->findOneBy([
                'municipality' => $place
            ]);
        }

        if(!$location){
            $location = $this->repository->findOneBy([
                'state_district' => $place
            ]);
        }

        if(!$location){
            $location = $this->repository->findOneBy([
                'administrative' => $place
            ]);
        }

        if(!$location){
            $location = $this->repository->findOneBy([
                'state' => $place
            ]);
        }

        if(!$location){
            $location = $this->repository->findOneBy([
                'village' => $place
            ]);
        }

        if(!$location){
            $location = $this->repository->findOneBy([
                'region' => $place
            ]);
        }

        if(!$location){
            $location = $this->repository->findOneBy([
                'province' => $place
            ]);
        }

        if(!$location){
            $location = $this->repository->findOneBy([
                'city' => $place
            ]);
        }

        if(!$location){
            $location = $this->repository->findOneBy([
                'locality' => $place
            ]);
        }

        if(!$location){
            $location = $this->repository->findOneBy([
                'postcode' => $place
            ]);
        }

        if(!$location){
            $location = $this->repository->findOneBy([
                'country' => $place
            ]);
        }

        if(!$location){
            $data = 'No station found for this location';
            return $this->json($data);
        }

        $data = $location->getId();

        return $this->json(['id' => $data]);

    }


}

