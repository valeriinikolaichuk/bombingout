<?php
    namespace App\Service\Login\Result;

    use App\Service\Login\LoginDTO\LoginContext;
    use App\Service\Login\LoginDTO\LoginResultDTO;
    use App\Entity\UserReg;

    class LoginSuccessFiller implements ResultFillerInterface
    {
        public function supports(
            ?UserReg $user,
            LoginContext $context
        ): bool {
            return $user !== null;
        }

        public function fill(
            LoginResultDTO $result,
            ?UserReg $user,
            LoginContext $context
        ): void {
            $context -> user = $user;

            $result -> success = true;
            $result -> context = $context;
        }
    }
?>