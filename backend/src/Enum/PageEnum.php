<?php
    namespace App\Enum;

    enum PageEnum: string
    {
        case ADMIN        = 'admin';
        case WEIGHING_IN  = 'weighingIn';
        case SCOREBOARD   = 'scoreboard';
        case ORDER        = 'order';
        case BARS         = 'bars';
        case INFORMATION  = 'information';
        case TIMER        = 'timer';

        public static function values(): array
        {
            return array_map(
                static fn(self $case) => $case -> value,
                self::cases()
            );
        }

        public static function regex(): string
        {
            return implode('|', self::values());
        }
    }
?>