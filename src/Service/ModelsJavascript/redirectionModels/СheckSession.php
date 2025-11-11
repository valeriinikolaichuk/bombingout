<?php
    namespace App\Service\ModelsJavascript\redirectionModels;

    use Doctrine\DBAL\Connection;

    class CheckSession {
        private Connection $db;

        public function __construct(Connection $db){
            $this -> db = $db;
        }

        public function checkSession(int $id_user, int $id_status): array {
            $result = $this -> db -> fetchAssociative(
                "SELECT id_status, lang FROM powerliftingsymfony.computer_status 
                WHERE users_ID = :id_user AND id_status < :id_status LIMIT 1", [
                    'id_user'   => $id_user,
                    'id_status' => $id_status
                ]);

            return $result ?? [];
        }
    }
?>