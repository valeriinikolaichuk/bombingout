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

        public function checkLogin(string $login, string $password): ?UserReg {

            $user = $this -> findOneBy(['username' => $login]);

            if (!$user || !password_verify($password, $user->getPassword())) {
                return null;
            }

            return $user;
        }
    }
?>