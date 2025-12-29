<?php
    namespace App\Service\Redirection;

    use App\Service\Redirection\Actions\ActionInterface;
    use App\Exception\UnprocessableEntityException;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;

    class ActionFactory
    {
        /** @var iterable<ActionInterface> */
        public function __construct(private iterable $actions) {}

        public function handle(
            string $action, 
            Request $request
        ): Response {

            foreach ($this -> actions as $handler) {
                if ($handler -> supports($action)) {
                    return $handler -> handle($request);
                }
            }

            throw new UnprocessableEntityException('Unknown action');
        }
    }
?>