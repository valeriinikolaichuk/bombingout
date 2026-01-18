<?php
    namespace App\Service\DeleteConnection\CleanConnection;

    use App\Service\DeleteConnection\DeleteConnectionInterface;
    use App\Service\DeleteConnection\DeleteConnectionDTO\DeleteConnectionContext;
    use App\Service\DeleteConnection\DeleteConnectionDTO\CleanConnectionDTO;

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

        public function execute(
            CleanConnectionDTO $dto, 
            DeleteConnectionContext $context
        ): CleanConnectionDTO {

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

            $dto -> success = true;
            $dto -> message = 'ok';

            return $dto;
        }
    }
?>