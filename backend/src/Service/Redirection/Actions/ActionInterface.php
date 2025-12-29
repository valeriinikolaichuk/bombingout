<?php
    namespace App\Service\Redirection\Actions;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;

    interface ActionInterface
    {
        public function supports(string $action): bool;

        public function handle(Request $request): Response;
    }
?>