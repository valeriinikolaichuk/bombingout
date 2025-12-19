<?php
    namespace App\Service\Main\Page;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    interface PageResolverInterface
    {
        public function supports(Request $request, SessionInterface $session): bool;

        public function resolve(Request $request, SessionInterface $session): PageResultDTO;
    }
?>