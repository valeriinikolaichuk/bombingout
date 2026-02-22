<?php
    namespace App\Service\Admin\MainPage\GetCompetitionData\CompetitionDataDTO;

    use App\Service\Admin\MainPage\GetCompetitionData\CompetitionDataDTO\ResultDTO\ResultItemDTOInterface;

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