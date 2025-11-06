<?php
    namespace App\Service;

    use App\Service\InsertStatus;
    use App\Service\CheckStatusClient;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class SetStatus {
        public function __construct(
            private InsertStatus $insertStatus, 
            private CheckStatusClient $checkStatusClient
        ){}

        public function handle(SessionInterface $session, ?string $compStatus = null): string{
            $idStatus = (int) $session->get('id_status');

            if ($compStatus === null) {
                if ($session -> has('comp_status')) {
                    $compStatus = $session -> get('comp_status');
                    $session -> remove('comp_status');
                } else {
                    $session -> clear();
                    throw new \RuntimeException('Computer status is undefined.');
                }
            }

            $session -> remove('id');
            $session -> remove('status');
            $session -> remove('language');

            $this -> insertStatus -> insertStatus($compStatus, $idStatus);

            $route = $this -> checkStatusClient -> getRouteFor($compStatus);
            if ($route === null) {
                throw new \RuntimeException("Unknown status: ".$compStatus);
            }

            return $route;
        }
    }
?>