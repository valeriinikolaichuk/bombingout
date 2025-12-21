<?php
    namespace App\Service\Login\DeleteOldLogin;

    interface DeletePreviousRegInterface
    {
        public function supports(DeletePrevRegContext $context): bool;

        public function execute(DeletePrevRegContext $context): array;
    }
?>