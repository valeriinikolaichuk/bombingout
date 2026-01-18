<?php
    namespace App\Service\DeleteConnection\DeleteConnectionDTO;

    class DeleteConnectionContext
    {
        public ?int $usersId = null;
        public ?int $id_status = null;
        public ?string $usersIp = null;
        public ?string $usersAgent = null;

        public ?string $hasDeleteCriteria = null;
    }
?>