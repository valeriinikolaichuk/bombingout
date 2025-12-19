<?php
    namespace App\Service\Login\Infrastructure\Persistence\ComputerStatus;

    use Doctrine\DBAL\Connection;

    final class ComputerStatusReader
    {
        public function __construct(
            private Connection $db
        ) {}

        public function existsForUser(string $ip, string $agent): bool
        {
            $sql = "SELECT COUNT(*) FROM computer_status 
                WHERE ip_address = :ip 
                AND user_agent = :agent 
                LIMIT 1";

            return (bool) $this -> db -> fetchOne($sql, [
                'ip'    => $ip,
                'agent' => $agent
            ]);
        }
    }
?>