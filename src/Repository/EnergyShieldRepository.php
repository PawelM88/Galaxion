<?php declare(strict_types=1); 

namespace App\Repository;

use App\Entity\EnergyShield;
use App\Traits\CostRetrieverTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EnergyShield>
 */
class EnergyShieldRepository extends ServiceEntityRepository
{
    use CostRetrieverTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EnergyShield::class);
    }

    //    /**
    //     * @return EnergyShield[] Returns an array of EnergyShield objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('e.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?EnergyShield
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
