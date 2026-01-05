<?php
    namespace App\Service\Redirection\RequestHandler;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class SessionLogout implements RequestHandlerInterface
    {
        public function supports(string $action): bool
        {
            return $action === 'logout';
        }

        public function execute(SessionInterface $session, string $action): void
        {
            $session ->invalidate();
        }
    }
?>
