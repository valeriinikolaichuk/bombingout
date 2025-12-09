<?php
    namespace App\Service\Login\Strategy;

    use App\Service\Login\LoginContext;

    class LoginStrategyRedirect implements LoginInterface {
        public function __construct() {}

        public function supports(LoginContext $context): bool
        {
            return !empty($context -> page);
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