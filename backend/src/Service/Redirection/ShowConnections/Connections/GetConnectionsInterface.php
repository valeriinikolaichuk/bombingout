<?php
    namespace App\Service\Redirection\ShowConnections\Connections;

    use App\Service\Redirection\ShowConnections\UserDataDTO;

    interface GetConnectionsInterface
    {
        public function supports(UserDataDTO $context): bool;

        public function connectionData(UserDataDTO $context): array;
    }
?>