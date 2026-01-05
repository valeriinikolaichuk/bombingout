<?php
    namespace App\Service\Redirection\Actions;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;

    interface ActionInterface
    {
        public function supports(string $action): bool;

        public function action(Request $request, string $action): Response;
    }
?>