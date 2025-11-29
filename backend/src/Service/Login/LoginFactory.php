<?php
    namespace App\Service\Login;

    use Symfony\Component\HttpFoundation\RequestStack;

    class LoginFactory {
        public function __construct(
            private LoginStrategyLocal $local,
            private LoginStrategyProd $prod,
            private LoginStrategyRedirect $redirect,
            private RequestStack $requestStack
        ) {}

        public function get(): LoginInterface {
            $request = $this -> requestStack -> getCurrentRequest();
            if (!$request) {
                return $this -> local;
            }

            $path = $request -> getPathInfo();
            $host = $request -> getHost();

            if ($path === '/api/login_redirect') {
                return $this -> redirect;
            }

            if ($host === 'localhost') {
                return $this -> local;
            }

            return $this -> prod;
        }
    }
?>