<?php
    namespace App\Service\ShowConnections;

    use App\Repository\ShowConnectionsRepository;

    class GetUserConnections
    {
        public function __construct(
            private ShowConnectionsRepository $repo
        ) {}

        /** @return ComputerStatus[] */
        public function execute(int $userId): array
        {
            return $this -> repo -> getConnectionsByUser($userId);
        }
    }
?>