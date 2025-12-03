<?php
    namespace App\Service\Login\Filler;

    use App\Service\Login\LoginContext;
    use Symfony\Component\HttpFoundation\Request;

    class CredentialsFiller implements ContextFillerInterface
    {
        public function supports(Request $request): bool
        {
            return true;
        }

        public function fill(LoginContext $context, Request $request): void
        {
            $data = json_decode($request -> getContent(), true);

            $context -> login = $data['login'] ?? null;
            $context -> password = $data['password'] ?? null;
        }   
    }
?>