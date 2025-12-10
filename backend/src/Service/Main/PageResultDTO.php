<?php
    namespace App\Service\PageFlow;

    class PageResultDTO
    {
        public function __construct(
            public string $template,
            public array $data = []
        ) {}
    }
?>