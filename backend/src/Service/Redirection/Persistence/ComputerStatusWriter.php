<?php
    namespace App\Service\Redirection\Persistence;

    use Doctrine\DBAL\Connection;
    use Doctrine\DBAL\ParameterType;

    class ComputerStatusWriter {
        public function __construct(private Connection $db) {}

        public function saveData(
            int $idStatus,
            ?string $action,
        ): void {

            $this -> db -> executeStatement(
                "UPDATE computer_status 
                SET comp_status = :comp_status
                WHERE id_status = :id_status",
                [
                    'comp_status' => $action,
                    'id_status'   => $idStatus
                ],
                [
                    'comp_status' => ParameterType::STRING,
                    'id_status'   => ParameterType::INTEGER
                ]
            );
        }
    }
?>