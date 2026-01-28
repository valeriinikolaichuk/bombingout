<?php
    namespace App\Service\Redirection;

    use App\Service\Http\SessionAwareTrait;
    use App\Service\Redirection\RequestHandler\RequestHandlerInterface;

    use Symfony\Component\HttpFoundation\RequestStack;

    class RequestHandler
    {
        use SessionAwareTrait;

        /** @var iterable<RequestHandlerInterface[]> */
        private iterable $handlers;

        public function __construct(
            RequestStack $requestStack,
            iterable $handlers
        ) {
            $this -> requestStack = $requestStack;
            $this -> handlers = $handlers;
        }

        public function handle(string $action): string 
        {
            $session = $this ->getSession();

            foreach ($this -> handlers as $handler) {
                if ($handler -> supports($session, $action)) {
                    return $handler -> execute($session, $action);
                }
            }

            return 'home';
        }
    }
?>