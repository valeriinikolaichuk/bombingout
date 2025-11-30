<?php
    namespace App\Service\Redirection;

    class Admin implements RedirectionInterface {
        public function render(): string
        {
            return 'main_page.html.twig';
        }
    }
?>