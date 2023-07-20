<?php

namespace App\Repository;

use App\Entity\Measure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Exception;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Measure>
 *
 * @method Measure|null find($id, $lockMode = null, $lockVersion = null)
 * @method Measure|null findOneBy(array $criteria, array $orderBy = null)
 * @method Measure[]    findAll()
 * @method Measure[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MeasureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Measure::class);
    }

    public function save(Measure $entity, bool $flush = false): void
    {
        try {
            $this->getEntityManager()->persist($entity);

            if ($flush) {
                $this->getEntityManager()->flush();
            }
        } catch (\Exception $e) {
            error_log('Hello there : ', $e);
        }
    }

    public function remove(Measure $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @throws Exception
     */
    public function getVoltage(): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT value -> \'kwh\' AS kwh, time, id
            FROM measure
            WHERE value -> \'kwh\' IS NOT NULL
            ORDER BY time DESC;
        ';

        $resultSet = $conn->executeQuery($sql);

        return $resultSet->fetchAllAssociative();
    }

    /**
     * @throws Exception
     */
    public function getVoltageByNodeId($nodeId): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT value -> \'kwh\' AS kwh, time, id
            FROM measure
            WHERE value -> \'kwh\' IS NOT NULL
            AND node_id = :nodeId
            ORDER BY time DESC;
        ';

        $resultSet = $conn->executeQuery($sql, ['nodeId' => $nodeId]);

        return $resultSet->fetchAllAssociative();
    }
//    /**
//     * @return Measure[] Returns an array of Measure objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Measure
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
