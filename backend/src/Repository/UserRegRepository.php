<?php
    namespace App\Repository;

    use App\Entity\UserReg;
    use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
    use Doctrine\Persistence\ManagerRegistry;

    class UserRegRepository extends ServiceEntityRepository {
        public function __construct(ManagerRegistry $registry)
        {
            parent::__construct($registry, UserReg::class);
        }

        public function findByUsername(string $username): ?UserReg 
        {
            return $this -> findOneBy(['username' => $username]);
        }
    }
?>