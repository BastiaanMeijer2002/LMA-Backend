<?php

namespace App\Repository;

use App\Entity\Geolocation;
use App\Entity\WeatherData;
use DateInterval;
use DateTime;
use DateTimeImmutable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Query\Expr;
use Doctrine\ORM\Query\Parameter;
use Doctrine\Persistence\ManagerRegistry;
use Exception;

/**
 * @extends ServiceEntityRepository<WeatherData>
 *
 * @method WeatherData|null find($id, $lockMode = null, $lockVersion = null)
 * @method WeatherData|null findOneBy(array $criteria, array $orderBy = null)
 * @method WeatherData[]    findAll()
 * @method WeatherData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WeatherDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WeatherData::class);
    }

    public function add(WeatherData $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(WeatherData $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    /**
     * @throws Exception
     */
    public function getStatistics($measurement_unit, $order, $date_start, $date_end, $amount): array
    {
        if ($order == 'highest'){
            $order = 'DESC';
        } else {
            $order = 'ASC';
        }

        $amount = (int)$amount;

        $qb = $this->createQueryBuilder('p')
            ->select("p.geolocation, MAX(p.".$measurement_unit.")".$measurement_unit)
            ->innerJoin(Geolocation::class, 'g', Expr\Join::WITH, 'g.id = p.geolocation')
            ->where("g.country_code = 'LV'")
            ->orWhere("g.country_code = 'DK'")
            ->orWhere("g.country_code = 'DE'")
            ->orWhere("g.country_code = 'EE'")
            ->orWhere("g.country_code = 'FI'")
            ->orWhere("g.country_code = 'LT'")
            ->orWhere("g.country_code = 'DK'")
            ->orWhere("g.country_code = 'PL'")
            ->orWhere("g.country_code = 'RU'")
            ->orWhere("g.country_code = 'DK'")
            ->orWhere("g.country_code = 'SE'")
            ->groupBy('p.geolocation')
            ->orderBy($measurement_unit, $order)
            ->setMaxResults($amount);

        $date_start = new DateTime($date_start);
        $date_end = new DateTime($date_end);

        $qb->andWhere($qb->expr()->between('p.date', ':date_start', ':date_end'))
            ->setParameters(
                new ArrayCollection([
                    new Parameter('date_start', $date_start->format("Y-m-d")),
                    new Parameter('date_end', $date_end->format("Y-m-d"))
                ])
            );

        $query = $qb->getQuery();

        $result = $query->execute();

        foreach ($result as $item){
            $place = $this->getEntityManager()->getRepository(Geolocation::class);
            $place = $place->getPlace((int)$item['geolocation']);
            $item['geolocation'] = $place;
        }

        return $result;

    }

    /**
     * @throws Exception
     */
    public function getDaysGraphData($station, $days): array {
        $qb = $this->createQueryBuilder('p')
            ->select("p.geolocation, p.date, AVG(p.wind_speed) as wind_speed, AVG(p.rainfall) as rainfall")
            ->where("p.geolocation = :station")
            ->setParameter('station', $station)
            ->groupBy('p.date')
            ->orderBy('p.date', 'DESC')
            ->setMaxResults((int)$days);

        $query = $qb->getQuery();

        return $query->execute();
    }
}