<?php
    namespace App\Service\Login\StatusManager;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class UserStatusManager
    {
        /** @var iterable<UserStatusHandlerInterface> */
        private iterable $handlers;

        public function __construct(iterable $handlers)
        {
            $this -> handlers = $handlers;
        }

        /**
        * @return array{template: string, data: array<string, mixed>}
        */

        public function handleStatus(
            Request $request, 
            SessionInterface $session
            ): ?string {

            $status = $session -> get('status');

            foreach ($this -> handlers as $handler) {
                if ($handler -> supports($status)) {
                    return $handler -> handle($request, $session);
                }
            }

            return [
                'template' => 'error.html.twig',
                'data'     => []
            ];
        }
    }
?>