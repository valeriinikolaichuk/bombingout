<?php
    namespace App\Service\Redirection;

    class Bars implements RedirectionInterface {
        public function render(): string
        {
            return 'bars_page.html.twig';
        }
    }
?>