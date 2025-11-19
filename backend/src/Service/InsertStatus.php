<?php
    namespace App\Service;

    use Doctrine\DBAL\Connection;

    class InsertStatus implements InsertStatusInterface {
        private Connection $connection;

        public function __construct(Connection $connection){
            $this -> connection = $connection;
        }

        public function insertStatus(string $compStatus, int $idStatus): void
        {
            $sql = 'UPDATE powerlifting.computer_status SET comp_status = :comp_status WHERE id_status = :id_status';

            $this -> connection -> executeStatement($sql, [
                'comp_status' => $compStatus,
                'id_status' => $idStatus,
            ]);
        }
    }
?>