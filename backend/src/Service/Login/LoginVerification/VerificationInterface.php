<?php
    namespace App\Service\Login\LoginVerification;

    use App\Service\Login\LoginContext;
    use App\Entity\UserReg;

    interface VerificationInterface
    {
        public function supports(LoginContext $context): bool;

        public function check(LoginContext $context): ?UserReg;
    }
?>