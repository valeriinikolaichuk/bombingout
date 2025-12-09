<?php
    namespace App\Service\Login\PostLogin;

    use App\Service\Login\LoginContext;
    use App\Service\Login\StatusTableLogin\ComputerStatusService;

    class ParticipantStatusHandler implements PostLoginInterface
    {
        public function __construct(
            private ComputerStatusService $computerStatusService
        ) {}

        public function supports(LoginContext $context): bool
        {
            return
                $context -> user -> getStatus() !== 'participant'
                && !$context -> session -> has('id_status');
        }

        public function handle(LoginContext $context): void
        {
            $idStatus = $this -> computerStatusService -> createStatus($context);
            $context -> session -> set('id_status', $idStatus);
            $context -> session -> save();
        }
    }
?>