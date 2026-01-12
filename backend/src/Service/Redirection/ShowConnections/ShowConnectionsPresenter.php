<?php
    namespace App\Service\Redirection\ShowConnections;

    use App\Entity\ComputerStatus;

    class ShowConnectionsPresenter
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
                        'grpPage'    => $c->getGrpPage(),
                    ],
                    $connections
                )
            ];
        }
    }
?>