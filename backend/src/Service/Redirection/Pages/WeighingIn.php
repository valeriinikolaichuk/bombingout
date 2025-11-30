<?php
    namespace App\Service\Redirection;

    class WeighingIn implements RedirectionInterface {
        public function render(): string
        {
            return 'weighing_in_page.html.twig';
        }
    }
?>