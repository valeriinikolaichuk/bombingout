<?php
    namespace App\Service;

    use Doctrine\DBAL\Connection;

    class GetSessionsValues {
        public function __construct(private Connection $db) {}

        public function sessionsValues(string $column, int $id_status): array {
            $result = $this -> db -> fetchAssociative(
                "SELECT $column FROM powerliftingsymfony.computer_status 
                WHERE id_status = :id_status",
                ['id_status' => $id_status]
            );

            return $result ?? [];
        }

        public function sessionsValues_app(int $id_status): array {
            $result = $this -> db -> fetchAssociative(
                "SELECT * FROM powerliftingsymfony.computer_status 
                WHERE id_status = :id_status",
                ['id_status' => $id_status]
            );

            return $result ?? [];
        }

        public function getCompData(int $comp_id): array {
            $result = $this -> db -> fetchAssociative(
                "SELECT competition_name, sex, type, categories FROM powerliftingsymfony.competitions 
                WHERE comp_id = :comp_id",
                ['comp_id' => $comp_id]
            );

            return $result ?? [];
        }
    }
?>