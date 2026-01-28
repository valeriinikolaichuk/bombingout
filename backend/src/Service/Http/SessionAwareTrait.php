<?php
    namespace App\Service\Http;

    use Symfony\Component\HttpFoundation\RequestStack;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;

    trait SessionAwareTrait
    {
        protected RequestStack $requestStack;

        protected function getSession(): SessionInterface
        {
            $request = $this -> requestStack ->getCurrentRequest();

            if (!$request || !$request->hasSession()) {
                throw new \LogicException('Session is not available');
            }

            return $request ->getSession();
        }
    }
?>