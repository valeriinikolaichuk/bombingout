<?php
    namespace App\Service\Login\LoginByRequest;

    use Symfony\Component\HttpFoundation\Request;

    interface LoginByRequestInterface
    {
        public function supports(string $type): bool;

        public function loginByRequest(Request $request): array;
    }
?>