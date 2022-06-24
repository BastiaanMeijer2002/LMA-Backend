<?php

namespace App\Controller;

use App\Entity\Geolocation;
use Doctrine\Persistence\ManagerRegistry;
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

    #[Route('/info/place/{id}', name: 'app_station_info_place', methods: "GET")]
    public function geolocationPlaceID(int $id): Response
    {
        $station = $this->repository->find($id);

        $town = $station->getTown();
        if ($town){

            $place = $town;

        }

        $temp = $station->getPlace();
        if ($temp){

            $place = $temp;

        }

        $temp = $station->getIsland();
        if ($temp){

            $place = $temp;

        }

        $temp = $station->getVillage();
        if ($temp){

            $place = $temp;

        }

        $temp = $station->getCity();
        if ($temp){

            $place = $temp;

        }

        $temp = $station->getMunicipality();
        if ($temp){

            $place = $temp;

        }

        $temp = $station->getCounty();
        if ($temp){

            $place = $temp;

        }

        $temp = $station->getRegion();
        if ($temp){

            $place = $temp;

        }

        $country = $station->getCountry();
        

        $data = [
            'place' => $place,
            'country' => $country
        ];

        return $this->json($data);

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

