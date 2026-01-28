<?php
    namespace App\Service\GoBack;

    use App\Service\Http\SessionAwareTrait;
    use App\Service\GoBack\Action\GoBackInterface;
    use App\Service\GoBack\GoBackDTO\GoBackContext;
    use App\Service\GoBack\GoBackDTO\ResultDTO;

    use Symfony\Component\HttpFoundation\RequestStack;

    class GoBackFactory
    {
        use SessionAwareTrait;

        /** @var iterable<GoBackInterface[]> */
        private iterable $goBackResolvers;

        public function __construct(
            RequestStack $requestStack,
            iterable $goBackResolvers
        ) {
            $this -> requestStack = $requestStack;
            $this -> goBackResolvers = $goBackResolvers;
        }

        public function goBackAction(GoBackContext $context): ResultDTO
        {
            $session = $this ->getSession();

            $dto = new ResultDTO();

            foreach ($this -> goBackResolvers as $resolver) {
                if ($resolver -> supports($context, $session)) {
                    $result = $resolver -> resolve($context, $session, $dto);
                }
            }

            return $result;
        }
    }
?>