<?php
    namespace App\Service\Redirection\RequestAction;

    interface RequestActionInterface
    {
        public function supports(string $action): bool;

        public function action(array $data, string $action): string;
    }
?>