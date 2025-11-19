<?php

namespace App\Repository;

use App\Entity\UserReg;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserReg>
 */

class UserRegRepository extends ServiceEntityRepository {
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserReg::class);
    }

    public function checkLogin(string $login, string $password): ?UserReg {
        $user = $this->createQueryBuilder('u')
            ->andWhere('u.username = :login')
            ->setParameter('login', $login)
            ->getQuery()
            ->getOneOrNullResult();

        if (!$user){
            return null;
        }

        if (!password_verify($password, $user -> getPassword())){
            return null;
        }

        return $user;
    }

    //    /**
    //     * @return UserReg[] Returns an array of UserReg objects
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

    //    public function findOneBySomeField($value): ?UserReg
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
?>