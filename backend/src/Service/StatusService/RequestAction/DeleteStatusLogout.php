<?php
    namespace App\Service\StatusService\RequestAction;

    use App\Service\StatusService\Persistence\ComputerStatusRemover;

    class DeleteStatusLogout implements RequestActionInterface
    {
        public function __construct(
            private ComputerStatusRemover $remove
        ) {}

        public function supports(string $action): bool
        {
            return $action === 'logout';
        }

        public function action(
            array $data, 
            string $action
        ): string {
            
            $idStatus = (int)$data['id_status'];

            $this -> remove -> removeData($idStatus);

            return 'home';
        }
    }
?>