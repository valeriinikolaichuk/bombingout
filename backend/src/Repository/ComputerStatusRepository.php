<?php
    namespace App\Repository;

    use App\Entity\ComputerStatus;
    use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
    use Doctrine\Persistence\ManagerRegistry;

    class ComputerStatusRepository extends ServiceEntityRepository
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

        public function findByIdStatus(array $criteria): ?ComputerStatus
        {
            return $this->createQueryBuilder('cs')
                ->andWhere('cs.users_ID = :userId')
                ->andWhere('cs.comp_status = :compStatus')
                ->setParameter('userId', $criteria['users_ID'])
                ->setParameter('compStatus', $criteria['comp_status'])
                ->getQuery()
                ->getOneOrNullResult();
        }
    }
?>