<?php
    namespace App\Service\Redirection\Persistence;

    use Doctrine\DBAL\Connection;
    use Doctrine\DBAL\ParameterType;

    class ComputerStatusRemover
    {
        public function __construct(private Connection $db) {}

        public function removeData(int $idStatus): void 
        {
            $this -> db -> executeStatement(
                "DELETE FROM computer_status 
                WHERE id_status = :id_status",
                [
                    'id_status'   => $idStatus
                ],
                [
                    'id_status'   => ParameterType::INTEGER
                ]
            );
        }
    }
?>