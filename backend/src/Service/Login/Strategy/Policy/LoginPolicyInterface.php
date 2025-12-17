<?php
    namespace App\Service\Login\Strategy\Policy;

    use App\Service\Login\LoginDTO\LoginContext;
    use App\Service\Login\LoginDTO\LoginResultDTO;

    interface LoginPolicyInterface
    {
        public function supports(LoginContext $context): bool;

        public function check(LoginContext $context): ?LoginResultDTO;
    }
?>