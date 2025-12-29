<?php
    namespace App\Service\Redirection\Actions;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\RedirectResponse;

    class GoToPageA implements ActionInterface
    {
        public function supports(string $action): bool
        {
            return $action === 'page_a';
        }

        public function handle(Request $request): Response
        {
            return new RedirectResponse('/page-a');
        }
    }
?>