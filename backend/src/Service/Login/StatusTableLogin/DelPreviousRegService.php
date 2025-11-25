<?php
    namespace App\Service\Login\StatusTableLogin;

    use Doctrine\DBAL\Connection;

    class DelPreviousRegService {
        public function __construct(private Connection $db) {}

        public function deleteEntry(int $userId, string $ip, string $userAgent): void {
            $this -> db -> executeStatement(
                'DELETE FROM computer_status WHERE users_ID = :userId 
                AND ip_address = :ip 
                AND user_agent = :userAgent',
                [
                    'userId' => $userId,
                    'ip' => $ip,
                    'userAgent' => $userAgent
                ]
            );
        }
    }
?>