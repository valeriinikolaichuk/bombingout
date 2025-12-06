<?php
    namespace App\Service\Login\StatusManager;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    interface UserStatusHandlerInterface
    {
        public function supports(string $status): bool;

        /**
        * @return array{template: string, data: array<string, mixed>}
        */

        public function handle(Request $request, SessionInterface $session): array;
    }
?>