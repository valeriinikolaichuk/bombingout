<?php
    namespace App\Service\Redirection\Actions;

    interface PageActionInterface
    {
        public function supports(string $action): bool;

        public function action(string $action): array;
    }
?>