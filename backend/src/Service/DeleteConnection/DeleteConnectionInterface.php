<?php
    namespace App\Service\DeleteConnection;

    interface DeleteConnectionInterface
    {
        public function supports(DeleteConnectionContext $context): bool;

        public function execute(DeleteConnectionContext $context): array;
    }
?>