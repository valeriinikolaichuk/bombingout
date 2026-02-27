<?php
    namespace App\Service\GetCompetitionData\CompetitionDataDTO;

    class CompetitionDataResponseDTO
    {
        public function __construct(
            private ResultDTO $competitions,
            private ResultDTO $mainTable,
            private ResultDTO $sessionsTable,
        ) {}

        public function setCompetitions(ResultDTO $items): void
        {
            $this -> competitions = $items;
        }

        public function setMainTable(ResultDTO $items): void
        {
            $this -> mainTable = $items;
        }

        public function setSessionsTable(ResultDTO $items): void
        {
            $this -> sessionsTable = $items;
        }

        public function toArray(): array
        {
            return [
                'competitions' => $this -> competitions -> toArray(),
                'mainTable'    => $this -> mainTable -> toArray(),
                'sessions'     => $this -> sessionsTable -> toArray()
            ];
        }
    }
?>