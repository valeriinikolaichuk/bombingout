<?php
    namespace App\Service\Admin\Tables;

    use App\Service\Http\SessionAwareTrait;
    use App\Service\Admin\Tables\TableContext;
    use App\Service\Admin\Tables\Result\TableServiceInterface;

    use Symfony\Component\HttpFoundation\RequestStack;

    class TableService
    {
        use SessionAwareTrait;

        /** @var iterable<TableServiceInterface> */
        private iterable $tableResolvers;

        public function __construct(
            RequestStack $requestStack,
            iterable $tableResolvers
        ) {
            $this -> requestStack = $requestStack;
            $this -> tableResolvers = $tableResolvers;           
        }

        public function tableResolver(TableContext $context): array
        {
            $session = $this ->getSession();

            foreach ($this -> tableResolvers as $resolver) {
                if ($resolver -> supports($context, $session)) 
                {
                    return $resolver -> resolve($context, $session);
                }
            }
        }
    }
?>