<?
    namespace App\Service\Login\LoginMethod;

    use App\Service\Login\LoginContextBuilder;
    use App\Service\Login\StrategyFactory;
    use App\Event\Login\LoginCompletedEvent;
    use App\Service\Login\LoginResultDTO;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

    class LoginMethodContextBuilder implements LoginMethodInterface
    {
        public function __construct(
            private LoginContextBuilder $contextBuilder,
            private StrategyFactory $factory,
            private EventDispatcherInterface $dispatcher
        ) {}

        public function supports(Request $request): bool
        {
            $data = json_decode($request -> getContent(), true);

            return 
                isset($data['loginMethod']) && 
                $data['loginMethod'] === 'ContextBuilder';
        }

        public function getMethod(Request $request): LoginResultDTO
        {
            $context = $this -> contextBuilder -> build($request);
            $loginResult = $this -> factory -> chooseStrategy($context);

            $this -> dispatcher -> dispatch(
                new LoginCompletedEvent($loginResult)
            );

            return $loginResult;
        }
    }
?>