<?php
    namespace App\Service\Login;

    use App\Service\Login\Strategy\LoginInterface;

    class LoginFactory {
        /**
         * @param iterable<LoginInterface> $strategies
         */

        public function __construct(
            private iterable $strategies
        ) {}

        public function get(LoginContext $context): LoginInterface 
        {
            foreach ($this -> strategies as $strategy){
                if ($strategy -> supports($context)){
                    return $strategy;
                }
            }

            throw new \RuntimeException('No login strategy supports this request');
        }
    }
?>