<?php
    namespace App\Service\ShowConnections\Connections;

    use App\Repository\ShowConnectionsRepository;
    use App\Service\ShowConnections\UserDataDTO;

    class GetConnectionsById implements GetConnectionsInterface
    {
        public function __construct(
            private ShowConnectionsRepository $repo
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