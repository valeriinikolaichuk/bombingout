<?php
    namespace App\Service\Login\Event;

    use App\Service\Login\LoginDTO\LoginResultDTO;

    use Symfony\Contracts\EventDispatcher\Event;

    class LoginCompletedEvent extends Event
    {
        public function __construct(
            public LoginResultDTO $result
        ) {}
    }
?>