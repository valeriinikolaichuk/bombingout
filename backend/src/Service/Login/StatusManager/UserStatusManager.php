<?php
    namespace App\Service\Login\StatusManager;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class UserStatusManager
    {
        /** @var iterable<UserStatusHandlerInterface> */
        private iterable $handlers;

        public function __construct(iterable $handlers)
        {
            $this -> handlers = $handlers;
        }

        public function handleStatus(
            Request $request, 
            SessionInterface $session
            ): Response {

            $status = $session -> get('status');

            foreach ($this -> handlers as $handler) {
                if ($handler -> supports($status)) {
                    return $handler -> handle($request, $session);
                }
            }

            return new Response('No handler found for status: '.$status);
        }
    }
?>