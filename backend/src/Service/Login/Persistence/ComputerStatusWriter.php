<?php
    namespace App\Service\Login\Persistence;

    use Doctrine\DBAL\Connection;
    use Doctrine\DBAL\ParameterType;

    class ComputerStatusWriter {
        public function __construct(private Connection $db) {}

        public function saveData(
            int $userId,
            string $status,
            string $language,
            ?string $ip,
            ?string $agent
        ): int {

            $this -> db -> executeStatement(
                "INSERT INTO computer_status (users_ID, users_status, lang, ip_address, user_agent)
                 VALUES (:id_user, :users_status, :lang, :ip, :agent)",
                [
                    'id_user'      => $userId,
                    'users_status' => $status,
                    'lang'         => $language,
                    'ip'           => $ip,
                    'agent'        => $agent
                ],
                [
                    'id_user'      => ParameterType::INTEGER,
                    'users_status' => ParameterType::STRING,
                    'lang'         => ParameterType::STRING
                ]
            );

            return (int) $this -> db -> lastInsertId();
        }
    }
?>