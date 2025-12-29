<?php
    namespace App\Service\ShowConnections\Connections;

    use App\Service\ShowConnections\UserDataDTO;

    interface GetConnectionsInterface
    {
        public function supports(UserDataDTO $context): bool;

        public function connectionData(UserDataDTO $context): array;
    }
?>