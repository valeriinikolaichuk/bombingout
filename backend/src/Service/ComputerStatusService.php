<?php
    namespace App\Service;

    use Doctrine\DBAL\Connection;
    use App\Entity\UserReg;

    class ComputerStatusService {
        public function __construct(private Connection $db) {}

        public function createStatus(UserReg $user, string $language): int {
            $this -> db -> executeStatement(
                "INSERT INTO powerliftingsymfony.computer_status (users_ID, users_status, lang)
                 VALUES (:id_user, :users_status, :lang)",
                [
                    'id_user'      => $user -> getId(),
                    'users_status' => $user -> getStatus(),
                    'lang'         => $language,
                ]
            );

            return (int) $this -> db -> fetchOne(
                "SELECT MAX(id_status) FROM powerliftingsymfony.computer_status WHERE users_ID = :id_user",
                ['id_user' => $user -> getId()]
            );
        }
    }
?>