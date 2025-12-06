<?php
    namespace App\Service\Redirection\Pages;

    class Admin implements RedirectionInterface {
        public function render(): string
        {
            return 'main_page.html.twig';
        }
    }
?>