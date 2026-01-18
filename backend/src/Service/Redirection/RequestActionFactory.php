<?php
    namespace App\Service\Redirection;

    class RequestActionFactory
    {
        /** @var iterable<RequestActionInterface[]> */
        public function __construct(
            private iterable $requestActions
        ) {}

        public function action(array $data, string $action): string 
        {
            foreach ($this -> requestActions as $requestAction) {
                if ($requestAction -> supports($action)) {
                    return $requestAction -> action($data, $action);
                }
            }
        }
    }