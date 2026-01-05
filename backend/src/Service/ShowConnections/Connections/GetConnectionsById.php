<?php
    namespace App\Service\ShowConnections\Connections;

    use App\Repository\ComputerStatusRepository;
    use App\Service\ShowConnections\UserDataDTO;

    class GetConnectionsById implements GetConnectionsInterface
    {
        public function __construct(
            private ComputerStatusRepository $repo
        ) {} 

        public function supports(UserDataDTO $context): bool
        {
            return $context -> usersId !== null;
        }

        public function connectionData(UserDataDTO $context): array
        {
            return $this -> repo -> getConnectionsByUser($context -> usersId);
        }
    }
?>