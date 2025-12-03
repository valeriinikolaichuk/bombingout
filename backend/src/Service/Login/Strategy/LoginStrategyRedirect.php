<?php
    namespace App\Service\Login\Strategy;

    use App\Service\Login\LoginContext;

    use Symfony\Component\HttpFoundation\Request;

    class LoginStrategyRedirect implements LoginInterface {
        public function __construct() {}

        public function supports(Request $request): bool
        {
            return $request -> getPathInfo() === '/api/login_redirect';
        }

        public function login(LoginContext $context): array
        {
            $page = $context -> page;

            return [
                'success' => true,
                'message' => 'true',
                'page'    => '/'.$page
            ];
        }
    }
?>