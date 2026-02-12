<?php
    namespace App\Service\StatusService\Persistence;

    use Doctrine\DBAL\Connection;
    use Doctrine\DBAL\ParameterType;

    class CompetitionUpdater
    {
        public function __construct(private Connection $db) {}

        public function updateData(int $usersId, int $comp_id): void 
        {
            $this -> connection -> executeStatement(
                'UPDATE computer_status 
                SET comp_id = :comp_id 
                WHERE users_ID = :usersId',
                [
                    'comp_id' => $comp_id,
                    'usersId' => $usersId
                ],
                [
                    'comp_id' => ParameterType::INTEGER,
                    'usersId' => ParameterType::INTEGER
                ]
            );
        }
    }
?>