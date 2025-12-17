<?php
    namespace App\Service\Login\Result;

    use App\Service\Login\LoginDTO\LoginContext;
    use App\Service\Login\LoginDTO\LoginResultDTO;
    use App\Entity\UserReg;

    interface ResultFillerInterface
    {
        public function supports(
            ?UserReg $user,
            LoginContext $context
        ): bool;

        public function fill(
            LoginResultDTO $result,
            ?UserReg $user,
            LoginContext $context
        ): void;
    }
?>