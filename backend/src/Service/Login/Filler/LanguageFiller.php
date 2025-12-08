<?php
    namespace App\Service\Login\Filler;

    use App\Service\Login\LoginContext;

    use Symfony\Component\HttpFoundation\Request;

    class LanguageFiller implements ContextFillerInterface
    {
        public function supports(Request $request): bool
        {
            return $request -> getPathInfo() === '/api/login';
        }

        public function fill(LoginContext $context, Request $request): void
        {
            $data = json_decode($request -> getContent(), true);

            $context -> language = $data['language'] ?? 'en';
        }
    }
?>