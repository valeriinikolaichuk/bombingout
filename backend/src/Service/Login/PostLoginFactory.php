<?php
    namespace App\Service\Login;

    use App\Service\Login\Strategy\PostLoginInterface;

    class PostLoginFactory {
        /**
         * @param iterable<PostLoginInterface> $strategies
         */

        public function __construct(
            private iterable $strategies
        ) {}

        public function get(LoginContext $context): PostLoginInterface 
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