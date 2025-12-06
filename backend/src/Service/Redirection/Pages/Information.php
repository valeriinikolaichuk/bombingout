<?php
    namespace App\Service\Redirection\Pages;

    class Information implements RedirectionInterface {
        public function render(): string
        {
            return 'information_page.html.twig';
        }
    }
?>