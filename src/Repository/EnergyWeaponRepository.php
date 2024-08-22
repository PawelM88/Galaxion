<?php declare(strict_types=1); 

namespace App\Repository;

use App\Entity\EnergyWeapon;
use App\Traits\CostRetrieverTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EnergyWeapon>
 */
class EnergyWeaponRepository extends ServiceEntityRepository
{
    use CostRetrieverTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EnergyWeapon::class);
    }

    //    /**
    //     * @return EnergyWeapon[] Returns an array of EnergyWeapon objects
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

    //    public function findOneBySomeField($value): ?EnergyWeapon
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
