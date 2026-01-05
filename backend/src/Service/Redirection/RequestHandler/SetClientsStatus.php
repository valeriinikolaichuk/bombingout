<?php
    namespace App\Service\Redirection\RequestHandler;

    use App\Repository\ComputerStatusRepository;
    use App\Service\Redirection\PageRegistry;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class SetClientsStatus implements RequestHandlerInterface
    {
        public function __construct(private ComputerStatusRepository $repo) {}

        public function supports(string $action): bool
        {
            return PageRegistry::isAllowed($action);
        }

        public function execute(SessionInterface $session, string $action): void
        {
            $idStatus = $session -> get('id_status');

            if (!$idStatus) {
                return;
            }

            $this -> repo -> updateCompStatus($idStatus, $action);
        }
    }
?>