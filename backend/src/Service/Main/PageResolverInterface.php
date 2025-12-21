<?php
    namespace App\Service\Main;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    interface PageResolverInterface
    {
        public function supports(Request $request, SessionInterface $session): bool;

        public function resolve(Request $request, SessionInterface $session): array;
    }
?>