<?php
    namespace App\Service\Login\Result;

    use App\Service\Login\LoginDTO\LoginContext;
    use App\Service\Login\LoginDTO\LoginResultDTO;
    use App\Entity\UserReg;

    class LoginFailureFiller implements ResultFillerInterface
    {
        public function supports(
            ?UserReg $user,
            LoginContext $context
        ): bool {
            return $user === null;
        }

        public function fill(
            LoginResultDTO $result,
            ?UserReg $user,
            LoginContext $context
        ): void {
            $result -> success = false;
            $result -> message = 'login or password is not correct';
            $result -> context = $context;
        }
    }
?>