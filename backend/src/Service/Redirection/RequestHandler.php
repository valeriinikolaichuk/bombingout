<?php
    namespace App\Service\Redirection;

    use App\Service\Redirection\RequestHandler\RequestHandlerInterface;

    use Symfony\Component\HttpFoundation\RequestStack;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class RequestHandler
    {
        /** @var iterable<RequestHandlerInterface[]> */
        public function __construct(
            private RequestStack $requestStack,
            private iterable $handlers
        ) {}

        public function handle(string $action): string 
        {
            $session = $this ->getSession();

            foreach ($this -> handlers as $handler) {
                if ($handler -> supports($action)) {
                    return $handler -> execute($session, $action);
                }
            }
        }

        private function getSession(): SessionInterface
        {
            $request = $this -> requestStack ->getCurrentRequest();

            if (!$request || !$request ->hasSession()) {
                throw new \LogicException('Session is not available');
            }

            return $request ->getSession();
        }
    }
?>