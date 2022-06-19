<?php

namespace App\Controller;

use App\Entity\Geolocation;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/search', name: 'app_search')]
class SearchController extends AbstractController
{
    public function __construct(private ManagerRegistry $doctrine) {$this->repository = $doctrine->getRepository(Geolocation::class);}

    #[Route('/{place}', name: 'search')]
    public function index(string $place): Response
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

        return $this->redirectToRoute('live',['geolocation'=>$data]);
    }
}
