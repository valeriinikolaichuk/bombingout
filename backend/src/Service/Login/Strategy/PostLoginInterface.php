<?php
    namespace App\Service\Login\Strategy;

    use App\Service\Login\LoginContext;

    interface PostLoginInterface
    {
        public function supports(LoginContext $context): bool;

        public function login(LoginContext $context): array;
    }
?>