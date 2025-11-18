<?php
    namespace App\Service;

    interface InsertStatusInterface
    {
        public function insertStatus(string $compStatus, int $idStatus): void;
    }
?>