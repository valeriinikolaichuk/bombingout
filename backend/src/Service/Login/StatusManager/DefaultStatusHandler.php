<?php
    namespace App\Service\Login\StatusManager;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;
    use Twig\Environment;

    class DefaultStatusHandler implements UserStatusHandlerInterface
    {
        private Environment $twig;
    
        public function __construct(Environment $twig)
        {
            $this -> twig = $twig;
        }

        public function supports(string $status): bool
        {
            return true;
        }

        public function handle(
            Request $request, 
            SessionInterface $session
            ): Response {

            $content = $this -> twig -> render('redirection_page.html.twig', [
                'lang'      => $session -> get('language'),
                'users_id'  => $session -> get('id'),
                'id_status' => $session -> get('id_status'),
            ]);

            return new Response($content);
        }
    }
?>