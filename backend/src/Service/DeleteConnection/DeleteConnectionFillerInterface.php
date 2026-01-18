<?php
    namespace App\Service\DeleteConnection;

    use App\Service\DeleteConnection\DeleteConnectionDTO\DeleteConnectionContext;

    use Symfony\Component\HttpFoundation\Request;

    interface DeleteConnectionFillerInterface
    {
        public function supports(Request $request): bool;

        public function fill(DeleteConnectionContext $context, Request $request): void;
    }
?>