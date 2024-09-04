<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\UserSpaceship;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserSpaceship>
 */
class UserSpaceshipRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserSpaceship::class);
    }

    /**
     * @param int $userId
     *
     * @return \App\Entity\UserSpaceship|null
     */
    public function findOneByUserId(int $userId): ?UserSpaceship
    {
        return $this->createQueryBuilder('u')
            ->join('u.user', 'user')
            ->andWhere('user.id = :user_id')
            ->setParameter('user_id', $userId)
            ->getQuery()
            ->getOneOrNullResult();
    }

    //    /**
    //     * @return UserSpaceship[] Returns an array of UserSpaceship objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('u.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?UserSpaceship
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
