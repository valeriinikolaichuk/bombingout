<?php
    namespace App\Service\Login\Strategy\Policy;

    use App\Infrastructure\Persistence\ComputerStatus\ComputerStatusReader;
    use App\Service\Login\LoginDTO\LoginContext;
    use App\Service\Login\LoginDTO\LoginResultDTO;

    final class ExistingEnvironmentPolicy implements LoginPolicyInterface
    {
        public function __construct(
            private ComputerStatusReader $reader
        ) {}

        public function supports(LoginContext $context): bool
        {
            return $context -> ip && $context -> agent;
        }

        public function check(LoginContext $context): ?LoginResultDTO
        {
            if ($this -> reader -> existsForUser(
                $context -> ip,
                $context -> agent
            )) {
                $result = new LoginResultDTO();
                $result -> success = false;
                $result -> message = 'You are already logged in from this browser';

                return $result;
            }

            return null;
        }
    }
?>