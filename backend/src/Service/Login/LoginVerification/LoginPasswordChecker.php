<?php
    namespace App\Service\Login\LoginVerification;

    use App\Service\Login\LoginDTO\LoginContext;

    use App\Repository\UserRegRepository;
    use App\Entity\UserReg;

    class LoginPasswordChecker implements VerificationInterface
    {
        public function __construct(private UserRegRepository $userRepo) {}

        public function supports(LoginContext $context): bool
        {
            return $context -> type === 'check by login and password';
        }

        public function check(LoginContext $context): ?UserReg
        {
            $this -> userRepo -> checkLogin($context -> login, $context -> password);
        }
    }
?>