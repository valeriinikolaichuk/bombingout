<?php
    namespace App\Service\Login\LoginByRequest;

    use App\Service\Login\LoginContext;
    use App\Entity\User;

    class LoginResultDTO
    {
        public function __construct(
            public bool $success,
            public ?User $user = null,
            public ?LoginContext $context = null,
            public ?string $message = null
        ) {}
    }
?>