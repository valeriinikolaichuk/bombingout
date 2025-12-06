<?php
    namespace App\Service\Redirection\Pages;

    class Timer implements RedirectionInterface {
        public function render(): string
        {
            return 'timer_page.html.twig';
        }
    }
?>