<?php
    namespace App\Service\Login;

    use App\Service\Login\Strategy\Sessions\LoginSessionServiceInterface;

//    use Symfony\Component\HttpFoundation\Session\SessionInterface;

//    use App\Service\Login\StatusTableLogin\ComputerStatusService;

    class LoginService {
        /**
        * @param iterable<LoginSessionServiceInterface> $sessionStrategies
        */

        public function __construct(
            private LoginSessionService $sessionService,
            private iterable $sessionStrategies
//            private ComputerStatusService $computerStatusService
        ) {}

        public function loginUser(LoginContext $context): void {
            foreach ($this -> sessionStrategies as $strategy){
                if ($strategy -> supports($context)){
                    $strategy -> setUserSession(
                        $context -> session,
                        $context -> user,
                        $context
                    );
                }
            }

//            $this -> sessionService -> setUserSession($context);
/*
            if ($user -> getStatus() !== 'participant' && !$session -> has('id_status')) {
                $idStatus = $this -> computerStatusService -> createStatus($context);
                $session -> set('id_status', $idStatus);
                $session -> save();
            }
                */
            foreach ($this -> postLogin as $handler) {
                if ($handler -> supports($context)) {
                    $handler -> handle($context);
                }
            }
        }
    }
?>