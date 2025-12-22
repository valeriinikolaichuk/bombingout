<?php
    namespace App\Service\ShowConnections;

    use App\Entity\ComputerStatus;

    class ShowConnectionsDTO
    {
        public function success(array $connections): array
        {
            return [
                'success' => true,
                'count' => count($connections),
                'connections' => array_map(
                    static fn(ComputerStatus $c) => [
                        'id'         => $c->getId(),
                        'status'     => $c->getCompStatus(),
                        'ip'         => $c->getIpAddress(),
                        'agent'      => $c->getUserAgent(),
                        'userStatus' => $c->getUsersStatus(),
                        'compId'     => $c->getCompId(),
                        'session'    => $c->getSessionsName(),
                        'discipline' => $c->getDiscipline(),
                        'attempt'    => $c->getAttempt(),
                        'lang'       => $c->getLang(),
                        'grpPage'    => $c->getGrpPage()
                    ],
                    $connections
                )
            ];
        }

        public function failure(string $message): array
        {
            return [
                'success' => false,
                'message' => $message
            ];
        }
    }
?>