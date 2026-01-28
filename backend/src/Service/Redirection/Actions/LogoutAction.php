<?php
    namespace App\Service\Redirection\Actions;

    use App\Service\Redirection\RequestHandler;

    class LogoutAction implements PageActionInterface
    {
        public function __construct(
            private RequestHandler $handler
        ) {}

        public function supports(string $action): bool
        {
            return $action === 'logout';
        }

        public function action(string $action): array
        {
            $result = $this -> handler -> handle($action);

            return [
                'route_name' => 'home',
                'parameters' => []
            ];
        }
    }
?>