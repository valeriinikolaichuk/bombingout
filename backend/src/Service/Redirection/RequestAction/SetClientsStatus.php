<?php
    namespace App\Service\Redirection\RequestAction;

    use App\Repository\ComputerStatusRepository;
    use App\Service\Redirection\PageRegistry;

    class SetClientsStatus implements RequestActionInterface
    {
        public function __construct(
            private ComputerStatusRepository $repo
        ) {}

        public function supports(string $action): bool
        {
            return PageRegistry::isAllowed($action);
        }

        public function action(
            array $data, 
            string $action
        ): string {

            if (!$data['id_status']){
                return 'home';
            }

            $idStatus = (int)$data['id_status'];

            $this -> repo -> updateCompStatus($idStatus, $action);

            return $action;
        }
    }
?>