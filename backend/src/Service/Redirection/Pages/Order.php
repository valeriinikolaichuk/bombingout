<?php
    namespace App\Service\Redirection;

    class Order implements RedirectionInterface {
        public function render(): string
        {
            return 'order_page.html.twig';
        }
    }
?>