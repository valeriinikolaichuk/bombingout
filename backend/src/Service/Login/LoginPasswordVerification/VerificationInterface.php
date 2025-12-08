<?php
    namespace App\Service\Login\LoginPasswordVerification;

    use App\Service\Login\LoginContext;
    use App\Entity\User;

    interface VerificationInterface
    {
        public function supports(LoginContext $context): bool;

        public function check(LoginContext $context): ?User;
    }
?>