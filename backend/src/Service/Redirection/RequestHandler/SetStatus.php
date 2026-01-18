<?php
    namespace App\Service\Redirection\RequestHandler;

    use App\Service\Redirection\RequestActionFactory;
    use App\Service\Redirection\PageRegistry;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class SetStatus implements RequestHandlerInterface
    {
        public function __construct(
            private RequestActionFactory $factory
        ) {}

        public function supports(string $action): bool
        {
            return PageRegistry::isAllowed($action);
        }

        public function execute(SessionInterface $session, string $action): string 
        {
            $data = array();

            $data['id_status'] = $session -> get('id_status');

            $result = $this -> factory -> action($data, $action);

            return $result;
        }
    }
?>