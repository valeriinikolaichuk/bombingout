<?php
    namespace App\Service\Redirection\Pages;

    class Bars implements RedirectionInterface {
        public function render(): string
        {
            return 'bars_page.html.twig';
        }
    }
?>