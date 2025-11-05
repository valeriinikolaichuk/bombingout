<?php
    namespace App\Service;

    use App\Service\InsertStatus;
    use App\Service\CheckStatusClient;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class SetStatus {
        private CheckStatusClient $checkStatusClient;

        public function __construct(
            private InsertStatus $insertStatus, 
            private CheckStatusClient $checkStatusClientService
        ){}

        public function handle(SessionInterface $session, ?string $compStatus = null): void{
            $idStatus = (int) $session->get('id_status');

            if ($compStatus === null) {
                if ($session -> has('comp_status')) {
                    $compStatus = $session -> get('comp_status');
                    $session->remove('comp_status');
                } else {
                    $session->clear();
                    throw new \RuntimeException('Computer status is undefined.');
                }
            }

            $session -> remove('id');
            $session -> remove('status');
            $session -> remove('language');

            $this -> insertStatus -> insertStatus($compStatus, $idStatus);

            $this -> checkStatusClient = $this -> checkStatusClientService;
            $this -> checkStatusClient -> check($compStatus);
        }
    }
?>