<?php
    namespace App\Service\Login;

    use App\Service\Login\LoginByRequest\LoginByRequestInterface;

    use Symfony\Component\HttpFoundation\Request;

    class LoginByRequestFactory
    {
        /** @var iterable<LoginByRequestInterface> */
        private iterable $strategies;

        public function __construct(iterable $strategies)
        {
            $this -> strategies = $strategies;
        }

        public function getByRequest(Request $request): LoginByRequestInterface
        {
            $type = $request ->get('type', 'default');

            foreach ($this -> strategies as $strategy) {
                if ($strategy -> supports($type)){
                    return $strategy;
                }
            }

            foreach ($this->strategies as $strategy) {
                if ($strategy -> supports('default')) {
                    return $strategy;
                }
            }
        }
    }
?>