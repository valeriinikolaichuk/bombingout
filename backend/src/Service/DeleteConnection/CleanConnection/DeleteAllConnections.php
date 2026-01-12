<?php
    namespace App\Service\DeleteConnection\CleanConnection;

    use App\Service\DeleteConnection\DeleteConnectionInterface;
    use App\Service\DeleteConnection\DeleteConnectionContext;

    use Doctrine\DBAL\Connection;

    class DeleteAllConnections implements DeleteConnectionInterface
    {
        public function __construct(private Connection $db) {}

        public function supports(DeleteConnectionContext $context): bool
        {
            return 
                $context -> hasDeleteCriteria === 'delete all by usersId' && 
                $context -> usersId !== null && 
                $context -> id_status !== null;
        }

        public function execute(DeleteConnectionContext $context): array 
        {
            $usersId = $context -> usersId;
            $id_status = $context -> id_status;

            $this -> db -> executeStatement(
                'DELETE FROM computer_status WHERE users_ID = :userId 
                    AND id_status != :idStatus',
                [
                    'userId'    => $usersId,
                    'idStatus' => $id_status
                ]
            );

            return [
                'success' => true, 
                'message' => 'entry deleted'
            ];
        }
    }
?>