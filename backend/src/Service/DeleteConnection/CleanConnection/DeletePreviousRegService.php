<?php
    namespace App\Service\DeleteConnection\CleanConnection;

    use App\Service\DeleteConnection\DeleteConnectionInterface;
    use App\Service\DeleteConnection\DeleteConnectionDTO\DeleteConnectionContext;
    use App\Service\DeleteConnection\DeleteConnectionDTO\CleanConnectionDTO;

    use Doctrine\DBAL\Connection;

    class DeletePreviousRegService implements DeleteConnectionInterface
    {
        public function __construct(private Connection $db) {}

        public function supports(DeleteConnectionContext $context): bool
        {
            return 
                $context -> hasDeleteCriteria === 'del previous registration' && 
                $context -> usersId !== null && 
                $context -> usersIp !== null &&
                $context -> usersAgent !== null;
        }

        public function execute(
            CleanConnectionDTO $dto, 
            DeleteConnectionContext $context
        ): CleanConnectionDTO {

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

            $dto -> success = true;
            $dto -> message = 'entry deleted';

            return $dto;
        }
    }
?>