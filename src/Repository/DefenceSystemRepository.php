<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\DefenceSystem;
use App\Traits\CostRetrieverTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DefenceSystem>
 */
class DefenceSystemRepository extends ServiceEntityRepository
{
    use CostRetrieverTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DefenceSystem::class);
    }

    //    /**
    //     * @return DefenceSystem[] Returns an array of DefenceSystem objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('d.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?DefenceSystem
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
