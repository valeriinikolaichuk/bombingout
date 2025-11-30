<?php
    namespace App\Service\Redirection;

    use App\Redirection\Pages\Admin;
    use App\Redirection\Pages\WeighingIn;
    use App\Redirection\Pages\Scoreboard;
    use App\Redirection\Pages\Order;
    use App\Redirection\Pages\Bars;
    use App\Redirection\Pages\Information;
    use App\Redirection\Pages\Timer;

    class RedirectionFactory {
        public static function create(string $key): RedirectionInterface
        {
            return match($key) {
                'admin'       => new Admin(),
                'weighingIn'  => new WeighingIn(),
                'scoreboard'  => new Scoreboard(),
                'order'       => new Order(),
                'bars'        => new Bars(),
                'information' => new Information(),
                'timer'       => new Timer(),
                default       => throw new \InvalidArgumentException('unknown page: '.$key)
            };
        }
    }
?>