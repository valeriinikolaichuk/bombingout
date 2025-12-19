<?php
    namespace App\Service\Main;

    class PageResultDTO
    {
        public function __construct(
            public string $template,
            public array $data = []
        ) {}
    }
?>