<?php
    namespace App\Service\Redirection\Actions;

    use App\Service\Redirection\RequestHandler;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;
    use Symfony\Component\HttpFoundation\RedirectResponse;

    class LogoutAction implements ActionInterface
    {
        public function __construct(private RequestHandler $handler) {}

        public function supports(string $action): bool
        {
            return $action === 'logout';
        }

        public function action(Request $request, string $action): Response
        {
            /** @var SessionInterface $session */
            $session = $request -> getSession();
            $this -> handler -> handle($session, $action);

            return new RedirectResponse('/');
        }
    }
?>