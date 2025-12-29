<?php
    namespace App\Service\Login\Filler;

    use App\Service\Login\LoginDTO\LoginContext;

    use Symfony\Component\HttpFoundation\Request;

    class LoginFiller implements ContextFillerInterface
    {
        public function supports(Request $request): bool
        {
            $data = json_decode($request -> getContent(), true);

            return isset($data['login']);
        }

        public function fill(LoginContext $context, Request $request): void
        {
            $data = json_decode($request -> getContent(), true);

            $context -> login = $data['login'] ?? null;
        } 
    }
?>