<?php
    namespace App\Service\Login\StatusTableLogin;

    use Doctrine\DBAL\Connection;

    class ComputerStatusService {
        public function __construct(private Connection $db) {}

        public function createStatus(LoginContext $context): int {

            $user     = $context -> user;
            $language = $context -> language;
            $ip       = $context -> ip;
            $agent    = $context -> agent;

            $this -> db -> executeStatement(
                "INSERT INTO powerliftingsymfony.computer_status (users_ID, users_status, lang, ip_address, user_agent)
                 VALUES (:id_user, :users_status, :lang, :ip, :agent)",
                [
                    'id_user'      => $user -> getId(),
                    'users_status' => $user -> getStatus(),
                    'lang'         => $language,
                    'ip'           => $ip,
                    'agent'        => $agent
                ]
            );

            return (int) $this -> db -> fetchOne(
                "SELECT MAX(id_status) FROM powerliftingsymfony.computer_status WHERE users_ID = :id_user",
                ['id_user' => $user -> getId()]
            );
        }
    }
?>