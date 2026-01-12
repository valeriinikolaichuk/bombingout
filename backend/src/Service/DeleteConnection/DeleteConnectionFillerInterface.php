<?php
    namespace App\Service\DeleteConnection;

    use Symfony\Component\HttpFoundation\Request;

    interface DeleteConnectionFillerInterface
    {
        public function supports(Request $request): bool;

        public function fill(DeleteConnectionContext $context, Request $request): void;
    }
?>