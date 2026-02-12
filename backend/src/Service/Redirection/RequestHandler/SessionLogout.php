<?php
    namespace App\Service\Redirection\RequestHandler;

    use App\Service\StatusService\RequestActionFactory;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class SessionLogout implements RequestHandlerInterface
    {
        public function __construct(
            private RequestActionFactory $factory
        ) {}
        
        public function supports(SessionInterface $session, string $action): bool
        {
            return $action === 'logout' && 
                $session -> has('id_status');
        }

        public function execute(SessionInterface $session, string $action): string 
        {
            $data = array();

            $data['id_status'] = $session -> get('id_status');

            $result = $this -> factory -> action($data, $action);

            $session ->clear();

            return $result;
        }
    }
?>
