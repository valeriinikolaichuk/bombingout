<?php
    namespace App\Service\Redirection;

    use App\Service\Redirection\Actions\PageActionInterface;
    use App\Exception\NoPageResolverFoundException;

    class PageActionFactory
    {
        /** @var iterable<PageActionInterface> */
        public function __construct(
            private iterable $actions
        ) {}

        public function handle(string $action): array {

            foreach ($this -> actions as $handler) {
                if ($handler -> supports($action)) {
                    return $handler -> action($action);
                }
            }

            throw new NoPageResolverFoundException($action);
        }
    }
?>