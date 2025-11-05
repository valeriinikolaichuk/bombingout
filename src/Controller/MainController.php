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

                $error = $session -> has('error_log_in') ? $session -> get('error_log_in') : null;
                $session->remove('error_log_in');
                    
                return $this -> render('login_page.html.twig', [
                    'error_log_in' => $error,
                ]);
            }

            if ($session -> get('status') !== 'participant') {
                if ($request -> request -> has('comp_status') || $session->has('comp_status')) {
                    $setStatus = new SetStatus();
                } else {
                    return $this->render('redirection_page.html.twig');
                }
            } 

        }
    }
?>