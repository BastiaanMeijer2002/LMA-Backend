<?php

namespace App\Repository;

use App\Entity\Geolocation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Geolocation>
 *
 * @method Geolocation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Geolocation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Geolocation[]    findAll()
 * @method Geolocation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GeolocationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Geolocation::class);
    }

    public function add(Geolocation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Geolocation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getPlace($id): string
    {
        $station = parent::find($id);
        $place = '';

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



        return $place.', '.$country;

    }

}