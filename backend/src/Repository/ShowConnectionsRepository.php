<?php
    namespace App\Repository;

    use App\Entity\ComputerStatus;
    use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
    use Doctrine\Persistence\ManagerRegistry;

    class ShowConnectionsRepository extends ServiceEntityRepository
    {
        public function __construct(ManagerRegistry $registry)
        {
            parent::__construct($registry, ComputerStatus::class);
        }

        /**
         * @return ComputerStatus[]
         */
        public function getConnectionsByUser(int $userId): array
        {
            return $this->createQueryBuilder('c')
                ->andWhere('c.users_ID = :uid')
                ->setParameter('uid', $userId)
                ->getQuery()
                ->getResult();
        }
    }
?>