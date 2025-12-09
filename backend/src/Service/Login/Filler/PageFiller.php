<?php
    namespace App\Service\Login\Filler;

    use App\Service\Login\LoginContext;
    use Symfony\Component\HttpFoundation\Request;

    class PageFiller implements ContextFillerInterface
    {
        public function supports(Request $request): bool
        {
            return $request -> getPathInfo() === '/api/login_redirect';
        }

        public function fill(LoginContext $context, Request $request): void
        {
            $data = json_decode($request -> getContent(), true);

            $context -> page = $data['page'] ?? null;
        }
    }
?>