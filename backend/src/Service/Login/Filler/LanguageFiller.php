<?php
    namespace App\Service\Login\Filler;

    use App\Service\Login\LoginDTO\LoginContext;

    use Symfony\Component\HttpFoundation\Request;

    class LanguageFiller implements ContextFillerInterface
    {
        public function supports(Request $request): bool
        {
            $data = json_decode($request -> getContent(), true);

            return isset($data['language']);
        }

        public function fill(LoginContext $context, Request $request): void
        {
            $data = json_decode($request -> getContent(), true);

            $context -> language = $data['language'] ?? 'en';
        }
    }
?>