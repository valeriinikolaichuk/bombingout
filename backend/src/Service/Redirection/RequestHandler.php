<?php
    namespace App\Service\Redirection;

    use App\Service\Redirection\RequestHandler\RequestHandlerInterface;

    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class RequestHandler
    {
        /** @var iterable<RequestHandlerInterface> */
        public function __construct(private iterable $handlers) {}

        public function handle(
            SessionInterface $session, 
            string $action
        ): void {
            foreach ($this -> handlers as $handler) {
                if ($handler -> supports($action)) {
                    $handler -> execute($session, $action);
                }
            }
        }
    }
?>