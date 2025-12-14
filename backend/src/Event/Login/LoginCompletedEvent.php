<?php
    namespace App\Event\Login;

    use App\Service\Login\LoginResultDTO;

    use Symfony\Contracts\EventDispatcher\Event;

    class LoginCompletedEvent extends Event
    {
        public function __construct(
            public LoginResultDTO $result
        ) {}
    }
?>