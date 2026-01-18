<?php
    namespace App\Service\Redirection\Actions;

    use App\Service\Redirection\RequestHandler;
    use App\Service\Redirection\PageRegistry;

    class GoToPage implements PageActionInterface
    {
        public function __construct(
            private RequestHandler $handler
        ) {}

        public function supports(string $action): bool
        {
            return PageRegistry::isAllowed($action);
        }

        public function action(string $action): string
        {
            $result = $this -> handler -> handle($action);

            return $action;
        }
    }
?>