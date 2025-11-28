<?php
    namespace App\Service\Login;

    use Symfony\Component\DependencyInjection\Attribute\TaggedIterator;
    use Symfony\Component\HttpFoundation\RequestStack;

    class LoginFactory {
        private array $strategies;
        private RequestStack $requestStack;

        public function __construct(
            #[TaggedIterator('app.login_strategy')] iterable $strategies){
            foreach ($strategies as $service) {
                $alias = $service::class === StandardLoginService::class ? 'standard' : 'alternate';
                $this->strategies[$alias] = $service;
            }
        }

        public function get(string $alias): LoginInterface
        {
            return $this->strategies[$alias] ?? $this->strategies['standard'];
        }
    }
?>