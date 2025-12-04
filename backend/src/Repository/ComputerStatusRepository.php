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
}
