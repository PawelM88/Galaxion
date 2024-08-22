<?php declare(strict_types=1); 

namespace App\Repository;

use App\Entity\RocketWeapon;
use App\Traits\CostRetrieverTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RocketWeapon>
 */
class RocketWeaponRepository extends ServiceEntityRepository
{
    use CostRetrieverTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RocketWeapon::class);
    }

    //    /**
    //     * @return RocketWeapon[] Returns an array of RocketWeapon objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('r.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?RocketWeapon
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
