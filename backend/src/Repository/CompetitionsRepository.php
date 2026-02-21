<?php
    namespace App\Repository;

    use App\Entity\Competitions;
    use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
    use Doctrine\Persistence\ManagerRegistry;

    /**
     * @extends ServiceEntityRepository<Competitions>
    */
    class CompetitionsRepository extends ServiceEntityRepository
    {
        public function __construct(ManagerRegistry $registry)
        {
            parent::__construct($registry, Competitions::class);
        }
    }
?>