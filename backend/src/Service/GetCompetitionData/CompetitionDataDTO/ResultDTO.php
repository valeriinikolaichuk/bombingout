<?php
    namespace App\Service\GetCompetitionData\CompetitionDataDTO;

    use App\Service\GetCompetitionData\CompetitionDataDTO\ResultDTO\ResultItemDTOInterface;

    class ResultDTO
    {
        /** @var ResultItemDTOInterface[] */
        public function __construct(
            private array $items
        ) {}

        public function toArray(): array
        {
            return array_map(
                fn(ResultItemDTOInterface $dto) => $dto ->toArray(),
                $this -> items
            );
        }
    }
?>