<?php
    namespace App\Service;

    class CheckStatusClient {
        public function getRouteFor(string $basename): ?string {
            return match ($basename) {
                'admin'       => 'admin_page',
                'scoreboard'  => 'scoreboard_page',
                'order'       => 'order_page',
                'bars'        => 'bars_page',
                'information' => 'information_page',
                'timer'       => 'timer_page',
                'weighingIn'  => 'weighing_page',
                default       => null,
            };
        }
    }
?>