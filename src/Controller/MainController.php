<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;
    use Symfony\Component\Routing\Annotation\Route;

    class MainController extends AbstractController {
        #[Route('/', name: 'home')]
        public function index(Request $request, SessionInterface $session): Response {
            if (!$session -> has('id') || !$session -> has('status') || !$session -> has('language')) {
                return $this -> render('login_page.html.twig');
            }
        }
    }
?>