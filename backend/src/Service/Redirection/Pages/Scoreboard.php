<?php
    namespace App\Service\Redirection;

    class Scoreboard implements RedirectionInterface {
        public function render(): string
        {
            return 'scoreboard_page.html.twig';
        }
    }
?>