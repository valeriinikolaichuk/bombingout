<?php
    namespace App\Service\Redirection\CheckAdmin;

    use App\Repository\ComputerStatusRepository;

    class AdminChecker
    {
        public function __construct(private ComputerStatusRepository $repo) {}

        public function isStatus(CheckAdminContext $context): bool
        {
            $userId = $context -> userId;
            $compStatus = $context -> comp_status;

            if (!$userId || !$compStatus) {
                return false;
            }

            $status = $this -> repo -> findByIdStatus([
                'users_ID'    => $userId,
                'comp_status' => $compStatus
            ]);

            return $status !== null;
        }
    }
?>