<?php
    namespace App\Service\Login\PostLogin;

    use App\Service\Login\LoginContext;

    interface PostLoginInterface
    {
        public function supports(LoginContext $context): bool;

        public function handle(LoginContext $context): void;
    }
?>