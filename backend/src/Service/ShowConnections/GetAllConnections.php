<?php
    namespace App\Service\ShowConnections;

    class GetAllConnections
    {
        public function __construct(
            private GetUserConnections $getUserConnections,
            private ShowConnectionsDTO $dto
        ) {}

        public function getConnections(?int $userId): array
        {
            if ($userId === null) {
                return $this -> dto -> failure(
                    'Connection is required. Please log in again.'
                );
            }

            $connections = $this -> getUserConnections -> execute($userId);

            return $this -> dto -> success($connections);
        }
    }
?>