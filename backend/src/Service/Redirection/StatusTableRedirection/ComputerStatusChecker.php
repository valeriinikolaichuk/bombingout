<?php
    namespace App\Service\Redirection\StatusTableRedirection;

    use App\Repository\ComputerStatusRepository;

    class ComputerStatusChecker
    {
        public function __construct(private ComputerStatusRepository $repo) {}

        public function isStatus(ComputerStatusContext $context): bool
        {
            $userId = $context -> userId;
            $compStatus = $context -> comp_status;

            if (!$userId || !$compStatus) {
                return false;
            }

            $status = $this -> repo -> findBy([
                'users_ID'    => $userId,
                'comp_status' => $compStatus
            ]);

            return $status !== null;
        }
    }
?>