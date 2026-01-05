<?php
    namespace App\Service\Redirection;

    final class PageRegistry
    {
        public const PAGES = [
            'admin',
            'weighingIn',
            'scoreboard',
            'order',
            'bars',
            'information',
            'timer',
        ];

        public static function isAllowed(string $page): bool
        {
            return in_array($page, self::PAGES, true);
        }
    }
?>