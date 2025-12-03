<?php
    namespace App\Service\Login\Strategy;

    use App\Service\Login\LoginContext;

    use Symfony\Component\HttpFoundation\Request;

    interface LoginInterface
    {
        public function supports(Request $request): bool;

        public function login(LoginContext $context): array;
    }
?>