<?php
    namespace App\Service\Login;

    use App\Service\Login\Strategy\StrategyAbstract;
    use App\Service\Login\LoginDTO\LoginContext;
    use App\Service\Login\LoginDTO\LoginResultDTO;

    class StrategyFactory
    {
        /** @var iterable<StrategyAbstract> */
        public function __construct(private iterable $checkers) {}

        public function chooseStrategy(LoginContext $context): LoginResultDTO
        {
            foreach ($this -> checkers as $checker) {
                if ($checker -> supports($context)) {
                    return $checker -> strategy($context);
                }
            }
        }
    }
?>