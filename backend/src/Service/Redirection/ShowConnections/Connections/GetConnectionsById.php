<?php
    namespace App\Service\Redirection\ShowConnections\Connections;

    use App\Repository\ComputerStatusRepository;
    use App\Service\Redirection\ShowConnections\UserDataDTO;

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