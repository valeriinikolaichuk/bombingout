<?php
    namespace App\Service\Redirection\RequestAction;

    use App\Service\Redirection\Persistence\ComputerStatusWriter;

    class UnsetClientsStatus implements RequestActionInterface
    {
        public function __construct(
            private ComputerStatusWriter $writer, 
        ) {}

        public function supports(string $action): bool
        {
            return $action === 'redirect';
        }

        public function action(
            array $data, 
            string $action
        ): string {

            $idStatus = (int)$data['id_status'];

            $this -> writer -> saveData($idStatus, '');

            return 'success';
        }
    }
?>