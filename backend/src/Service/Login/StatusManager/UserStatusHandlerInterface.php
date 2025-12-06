<?php
    namespace App\Service\Login\StatusManager;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    interface UserStatusHandlerInterface
    {
        public function supports(string $status): bool;

        public function handle(Request $request, SessionInterface $session): ?string;
    }
?>