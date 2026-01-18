<?php
    namespace App\Service\Redirection\RequestAction;

    use Doctrine\DBAL\Connection;

    class DeleteStatusLogout implements RequestActionInterface
    {
        public function __construct(
            private Connection $db
        ) {}

        public function supports(string $action): bool
        {
            return $action === 'logout';
        }

        public function action(
            array $data, 
            string $action
        ): string {

            if (!$data['id_status']){
                return 'home';
            }
            
            $idStatus = (int)$data['id_status'];

            $sql = <<<SQL
                DELETE FROM computer_status
                WHERE id_status = :id_status
                SQL;

            $this -> db -> executeStatement($sql, [
                'id_status' => $idStatus,
            ]);

            return 'home';
        }
    }
?>