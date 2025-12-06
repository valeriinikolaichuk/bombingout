<?php
    namespace App\Service\Redirection\Pages;

    class Scoreboard implements RedirectionInterface {
        public function render(): string
        {
            return 'scoreboard_page.html.twig';
        }
    }
?>