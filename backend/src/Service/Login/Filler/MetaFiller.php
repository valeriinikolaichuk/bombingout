<?php
    namespace App\Service\Login\Filler;

    use App\Service\Login\LoginContext;

    use Symfony\Component\HttpFoundation\Request;

    class MetaFiller implements ContextFillerInterface
    {
        public function supports(Request $request): bool
        {
            return $request -> getHost() !== 'localhost';
        }

        public function fill(LoginContext $context, Request $request): void
        {
            $context -> ip = $request -> getClientIp();
            $context -> agent = $request -> headers -> get('User-Agent');
        }
    }
?>