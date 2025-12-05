<?php

namespace App\Repository;

use App\Entity\ComputerStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class DeleteOldConnectionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ComputerStatus::class);
    }

    public function deleteOldConnectionsExceptCurrent(int $idUser): int
    {
        return $this->createQueryBuilder('c')
            ->delete()
            ->where('c.users_ID = :idUser')
            ->setParameter('idUser', $idUser)
            ->getQuery()
            ->execute();
    }
}
