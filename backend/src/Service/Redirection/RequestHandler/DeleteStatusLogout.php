<?php
    namespace App\Service\Redirection\RequestHandler;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class DeleteStatusLogout implements RequestHandlerInterface
    {
        public function __construct(private Connection $db) {}

        public function supports(string $action): bool
        {
            return $action === 'logout';
        }

        public function execute(SessionInterface $session, string $action): void
        {
            $idStatus = $session -> get('id_status');

            if (!$idStatus) {
                return;
            }

            $sql = <<<SQL
                DELETE FROM computer_status
                WHERE id_status = :id_status
                SQL;

            $this -> db -> executeStatement($sql, [
                'id_status' => $idStatus,
            ]);
        }
    }
?>