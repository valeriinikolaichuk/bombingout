<?php

    namespace App\Service;

    use Doctrine\DBAL\Connection;

    class CheckUserInTable
    {
        public function __construct(private Connection $db) {}

        public function existsForUser(int $userId, string $ip, string $agent): bool {
            $sql = "
                SELECT COUNT(*) FROM computer_status 
                WHERE user_ID = :user_id 
                AND ip_address = :ip 
                AND user_agent = :agent
            ";

            $count = $this -> db -> fetchOne($sql, [
                'user_id' => $userId,
                'ip'      => $ip,
                'agent'   => $agent,
            ]);

            return $count > 0;
        }
    }
?>