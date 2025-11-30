<?php
    namespace App\Service\Redirection;

    class Information implements RedirectionInterface {
        public function render(): string
        {
            return 'information_page.html.twig';
        }
    }
?>