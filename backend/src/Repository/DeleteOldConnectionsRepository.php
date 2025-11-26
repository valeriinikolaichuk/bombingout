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

public function deleteOldConnectionsExceptCurrent(int $idUser, string $ipAddress, string $userAgent): void
    {
        $qb = $this -> createQueryBuilder('c');

        $qb->delete()
            ->where('c.users_ID = :idUser')
            ->andWhere('c.ip_address != :ip')
            ->andWhere('c.user_agent != :agent')
            ->setParameters([
                'idUser' => $idUser,
                'ip' => $ipAddress,
                'agent' => $userAgent
            ]);

        $qb -> getQuery() -> execute();
    }
}
