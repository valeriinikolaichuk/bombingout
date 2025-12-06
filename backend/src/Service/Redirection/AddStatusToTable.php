<?php
    namespace App\Service\Redirection;

    use Doctrine\DBAL\Connection;

    class AddStatusToTable {
        private Connection $conn;

        public function __construct(Connection $conn)
        {
            $this->conn = $conn;
        }

        public function updateStatus(string $compStatus, int $idStatus): void
        {
            $sql = "UPDATE computer_status SET comp_status = :status WHERE id_status = :id";

            $this -> conn -> executeStatement($sql, [
                'status' => $compStatus,
                'id' => $idStatus
            ]);
        }
    }
?>