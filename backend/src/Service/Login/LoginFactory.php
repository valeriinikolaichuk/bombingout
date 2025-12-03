<?php
    namespace App\Service\Login;

    use App\Service\Login\Strategy\LoginInterface;

    use Symfony\Component\HttpFoundation\RequestStack;

    class LoginFactory {
        /**
         * @param iterable<LoginInterface> $strategies
         */

        public function __construct(
            private iterable $strategies,
            private RequestStack $requestStack
        ) {}

        public function get(): LoginInterface 
        {
            $request = $this -> requestStack -> getCurrentRequest();

            if (!$request){
                throw new \RuntimeException('No request available');
            }

            foreach ($this -> strategies as $strategy){
                if ($strategy -> supports($request)){
                    return $strategy;
                }
            }

            throw new \RuntimeException('No login strategy supports this request');
        }
    }
?>