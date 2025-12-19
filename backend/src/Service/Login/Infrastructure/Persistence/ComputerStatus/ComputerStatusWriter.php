<?php
    namespace App\Service\Login\Infrastructure\Persistence\ComputerStatus;

    use App\Service\Login\LoginDTO\LoginResultDTO;

    use Doctrine\DBAL\Connection;

    class ComputerStatusWriter {
        public function __construct(private Connection $db) {}

        public function saveData(LoginResultDTO $result): int {

            $context = $result -> context;
            $user    = $result -> user;

            $this -> db -> executeStatement(
                "INSERT INTO computer_status (users_ID, users_status, lang, ip_address, user_agent)
                 VALUES (:id_user, :users_status, :lang, :ip, :agent)",
                [
                    'id_user'      => $user -> getId(),
                    'users_status' => $user -> getStatus(),
                    'lang'         => $context -> language,
                    'ip'           => $context -> ip,
                    'agent'        => $context -> agent
                ]
            );

            return (int) $this -> db -> fetchOne(
                "SELECT MAX(id_status) FROM computer_status WHERE users_ID = :id_user",
                ['id_user' => $user -> getId()]
            );
        }
    }
?>