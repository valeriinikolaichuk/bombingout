<?php
    namespace App\Service\StatusService\RequestAction;

    use App\Service\StatusService\Persistence\ComputerStatusWriter;
    use App\Enum\PageEnum;

    class SetClientsStatus implements RequestActionInterface
    {
        public function __construct(
            private ComputerStatusWriter $writer, 
        ) {}

        public function supports(string $action): bool
        {
            return PageEnum::tryFrom($action) !== null;
        }

        public function action(
            array $data, 
            string $action
        ): string {

            $idStatus = (int)$data['id_status'];

            $this -> writer -> saveData($idStatus, $action);

            return $action;
        }
    }
?>