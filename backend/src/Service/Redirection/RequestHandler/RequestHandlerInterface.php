<?php
    namespace App\Service\Redirection\RequestHandler;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    interface RequestHandlerInterface
    {
        public function supports(string $action): bool;

        public function execute(SessionInterface $session, string $action): string;
    }
?>