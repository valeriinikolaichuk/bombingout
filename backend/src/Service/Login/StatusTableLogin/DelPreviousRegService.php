<?php
    namespace App\Service\Login\StatusTableLogin;

    use Doctrine\DBAL\Connection;

    class DelPreviousRegService {
        public function __construct(private Connection $db) {}

        public function deleteEntry(DeletePrevRegContext $context): void {

            $usersId = $context -> usersId;
            $usersIp = $context -> usersIp;
            $usersAgent = $context -> usersAgent;

            $this -> db -> executeStatement(
                'DELETE FROM computer_status WHERE users_ID = :userId 
                AND ip_address = :ip 
                AND user_agent = :userAgent',
                [
                    'userId'    => $usersId,
                    'ip'        => $usersIp,
                    'userAgent' => $usersAgent
                ]
            );
        }
    }
?>