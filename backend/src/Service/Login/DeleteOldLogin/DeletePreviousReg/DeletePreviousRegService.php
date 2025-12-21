<?php
    namespace App\Service\Login\DeleteOldLogin\DeletePreviousReg;

    use App\Service\Login\DeleteOldLogin\DeletePreviousRegInterface;
    use App\Service\Login\DeleteOldLogin\DeletePrevRegContext;

    use Doctrine\DBAL\Connection;

    class DeletePreviousRegService implements DeletePreviousRegInterface
    {
        public function __construct(private Connection $db) {}

        public function supports(DeletePrevRegContext $context): bool
        {
            return 
                $context -> hasDeleteCriteria && 
                $context -> usersId !== null && 
                $context -> usersIp !== null &&
                $context -> usersAgent !== null;
        }

        public function execute(DeletePrevRegContext $context): array 
        {
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

            return [
                'success' => true, 
                'message' => 'entry deleted'
            ];
        }
    }
?>