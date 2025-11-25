<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;
    use Symfony\Component\Routing\Annotation\Route;

    class MainController extends AbstractController {
        #[Route('/', name: 'home')]
        public function index(
            Request $request, 
            SessionInterface $session
            ): Response {

            if (!$session -> has('id') || !$session -> has('status') || !$session -> has('language')){
                return $this -> render('login_page.html.twig');
            }

            if ($session -> has('status') && $session -> get('status') === 'participant') {
                return $this -> redirectToRoute('dashboard');
            }

            return $this -> render('redirection_page.html.twig', [
                    'lang'      => $session -> get('language'),
                    'users_id'  => $session -> get('id'),
                    'id_status' => $session -> get('id_status'),
                ]);
        }
    }
?>