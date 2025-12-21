<?php
    namespace App\Service\Main;

    use App\Exception\NoPageResolverFoundException;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    class ResolverFactory
    {
        /** @var iterable<PageResolverInterface> */
        public function __construct(private iterable $resolvers) {}

        public function resolve(Request $request, SessionInterface $session): array
        {
            foreach ($this -> resolvers as $resolver) {
                if ($resolver -> supports($request, $session)) {
                    return $resolver -> resolve($request, $session);
                }
            }

            throw new NoPageResolverFoundException($request -> getPathInfo());
        }
    }
?>