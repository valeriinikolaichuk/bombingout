<?php
    namespace App\Service\Redirection\ShowConnections;

    use App\Service\Redirection\ShowConnections\Connections\GetConnectionsInterface;
    use App\Exception\UnprocessableEntityException;

    class ConnectionsFactory
    {
        /** @var iterable<GetConnectionsInterface> */
        public function __construct(private iterable $connections) {}

        public function getConnections(UserDataDTO $userData): array
        {
            foreach ($this -> connections as $connection) {
                if ($connection -> supports($userData)) {
                    return $connection -> connectionData($userData);
                }
            }

            throw new UnprocessableEntityException('Connection is required. Please log in again');
        }
    }
?>