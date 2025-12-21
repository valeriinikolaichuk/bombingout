<?php
    namespace App\Service\Login\DeleteOldLogin;

    class DeletePrevRegContext
    {
        public ?int $usersId = null;
        public ?string $usersIp = null;
        public ?string $usersAgent = null;

        public bool $hasDeleteCriteria = false;
    }
?>