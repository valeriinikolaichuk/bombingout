<?php
    namespace App\Service\Main;

    use App\Exception\NoPageResolverFoundException;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\RequestStack;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class ResolverFactory
    {
        /** @var iterable<PageResolverInterface> */
        public function __construct(
            private RequestStack $requestStack,
            private iterable $resolvers
        ) {}

        public function resolve(Request $request): array
        {
            $session = $this ->getSession();

            foreach ($this -> resolvers as $resolver) {
                if ($resolver -> supports($request, $session)) {
                    return $resolver -> resolve($request, $session);
                }
            }

            throw new NoPageResolverFoundException($request -> getPathInfo());
        }

        private function getSession(): SessionInterface
        {
            $request = $this -> requestStack ->getCurrentRequest();

            if (!$request || !$request ->hasSession()) {
                throw new \LogicException('Session is not available');
            }

            return $request ->getSession();
        }
    }
?>