<?php
    namespace App\Service\Redirection;

    use App\Repository\AdminStatusRepository;

    class AdminStatusChecker
    {
        public function __construct(private AdminStatusRepository $repo) {}

        public function isAdmin(int $userId): bool
        {
            $status = $this -> repo -> findBy([
                'users_ID'    => $userId,
                'comp_status' => 'admin'
            ]);

            return !empty($status);
        }
    }
?>