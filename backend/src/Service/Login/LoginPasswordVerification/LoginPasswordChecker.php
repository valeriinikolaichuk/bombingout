<?php
    namespace App\Service\Login\LoginPasswordVerification;

    use App\Service\Login\LoginContext;

    use App\Repository\UserRegRepository;
    use App\Entity\User;

    class LoginPasswordChecker implements VerificationInterface
    {
        public function __construct(private UserRegRepository $userRepo) {}

        public function supports(LoginContext $context): bool
        {
            return $context -> type === 'check by login and password';
        }

        public function check(LoginContext $context): ?User
        {
            return $this -> userRepo -> checkLogin($context -> login, $context -> password);
        }
    }
?>