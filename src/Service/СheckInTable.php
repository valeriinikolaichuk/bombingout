<?php
    namespace App\Service;

    use Doctrine\DBAL\Connection;

    class CheckInTable {
        private Connection $db;

        public function __construct(Connection $db){
            $this -> db = $db;
        }

        public function checkInTable(int $id_status): array {
            return $this -> db -> fetchAllAssociative(
                "SELECT id_status FROM powerliftingsymfony.computer_status WHERE id_status = :id_status", 
                ['id_status' => $id_status]
            );
        }
    }
?>


