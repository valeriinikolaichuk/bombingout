<?php
    namespace App\Service\GetCompetitionData\CompetitionDataDTO\ResultDTO;

    use App\Entity\SessionsTable;

    class SessionsTableResultItemDTO implements ResultItemDTOInterface
    {
        public function __construct(
            private ?int $id_sessions,
	        private ?int $comp_id,
            private ?string $all_sessions,
            private ?string $sessions_name,
            private ?int $grp,
            private ?int $category,
            private ?\DateTimeImmutable $dateTime,
            private ?int $users_id
        ) {}

        public static function fromEntity(SessionsTable $e): self
        {
            return new self(
                $e ->getId(),
                $e ->getCompId(),
                $e ->getAllSessions(),
                $e ->getSessionsName(),
                $e ->getGrp(),
                $e ->getCategory(),
                $e ->getDateTime(),
                $e ->getUser()
            );
        }

        public function toArray(): array
        {
            return [
                'id_sessions'   => $this -> id_sessions,
                'comp_id'       => $this -> comp_id,
                'all_sessions'  => $this -> all_sessions,
                'sessions_name' => $this -> sessions_name,
                'grp'           => $this -> grp,
                'category'      => $this -> category,
                'dateTime'      => $this -> dateTime,
                'users_id'      => $this -> users_id
            ];
        }
    }
?>