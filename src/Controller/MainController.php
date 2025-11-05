<?php
    namespace App\Controller;

    use App\Service\SetStatus;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;
    use Symfony\Component\Routing\Annotation\Route;

    class MainController extends AbstractController {
        #[Route('/', name: 'home')]
        public function index(Request $request, SessionInterface $session): Response {
            if (!$session -> has('id') || !$session -> has('status') || !$session -> has('language')){

                $error = $session -> has('error_log_in') ? $session -> get('error_log_in') : null;
                $session -> remove('error_log_in');
                    
                return $this -> render('login_page.html.twig', [
                    'error_log_in' => $error,
                ]);
            }

            if ($session -> get('status') !== 'participant'){
                $compStatus = $request->request -> get('comp_status');

                if ($compStatus || $session -> has('comp_status')){
                    try {
                        $setStatus->handle($session, $compStatus);
                    } catch (\RuntimeException $e) {
                        return $this->render('error_page.html.twig', ['message' => $e->getMessage()]);
                    }
                } else {
                    return $this->render('redirection_page.html.twig');
                }
            }
        }
    }
?>