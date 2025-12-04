<?php
    namespace App\Service\Login\StatusTableLogin;

    class DeletePrevRegContext
    {
        public int $usersId;
        public string $usersIp;
        public string $usersAgent;

        public bool $valid = false;
    }
?>