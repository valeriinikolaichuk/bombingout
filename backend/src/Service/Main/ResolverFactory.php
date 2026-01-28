<?php
    namespace App\Service\Main;

    use App\Service\Http\SessionAwareTrait;
    use App\Exception\NoPageResolverFoundException;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\RequestStack;

    class ResolverFactory
    {
        use SessionAwareTrait;

        /** @var iterable<PageResolverInterface> */
        private iterable $resolvers;

        public function __construct(
            RequestStack $requestStack,
            iterable $resolvers
        ) {
            $this -> requestStack = $requestStack;
            $this -> resolvers = $resolvers;           
        }

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
    }
?>