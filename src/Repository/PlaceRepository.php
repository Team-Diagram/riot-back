<?php

namespace App\Repository;

use App\Entity\Place;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Exception;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Place>
 *
 * @method Place|null find($id, $lockMode = null, $lockVersion = null)
 * @method Place|null findOneBy(array $criteria, array $orderBy = null)
 * @method Place[]    findAll()
 * @method Place[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlaceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Place::class);
    }

    public function save(Place $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Place $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function update(Place $place): void
    {
        $placeId = $place->getId();
        $people = $place->getPeopleCount();
        $isLight = $place->isLightState();
        $isHeater = $place->getHeaterState();
        $isVent = $place->getVentState();
        $isAc = $place->getAcState();

        $query = $this->createQueryBuilder('p')
            ->update()
            ->set('p.peopleCount', ':people')
            ->set('p.lightState', ':light')
            ->set('p.heaterState', ':heater')
            ->set('p.acState', ':ac')
            ->set('p.ventState', ':vent')
            ->where('p.id = :placeId')
            ->setParameter('people', $people)
            ->setParameter('light', $isLight)
            ->setParameter('heater', $isHeater)
            ->setParameter('ac', $isAc)
            ->setParameter('vent', $isVent)
            ->setParameter('placeId', $placeId)
            ->getQuery();
        $query->execute();
    }

    /**
     * @throws Exception
     */
    public function getAllLastMeasureForEveryPlace(): array
    {

        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT p.id AS place_id, p.name AS place_name, p.people_count,
            p.light_state, p.heater_state, p.ac_state, p.vent_state, JSON_AGG(m.value) AS measure_values
            FROM place p
            JOIN node n ON p.id = n.place_id
            JOIN (
                SELECT value, node_id
                FROM measure
                ORDER BY measure.time DESC
                LIMIT 42
            ) AS m ON m.node_id = n.id
            GROUP BY p.id, p.name, p.people_count, p.light_state, p.heater_state, p.ac_state, p.vent_state;
        ';

        $resultSet = $conn->executeQuery($sql);

        return $resultSet->fetchAllAssociative();
    }

    //    /**
    //     * @return Place[] Returns an array of Place objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Place
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
