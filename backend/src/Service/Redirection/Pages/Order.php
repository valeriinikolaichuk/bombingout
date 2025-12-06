<?php
    namespace App\Service\Redirection\Pages;

    class Order implements RedirectionInterface {
        public function render(): string
        {
            return 'order_page.html.twig';
        }
    }
?>