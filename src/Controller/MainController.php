<?php
    namespace App\Controller;

    use App\Service\SetStatus;
    use App\Service\CheckInTable;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;
    use Symfony\Component\Routing\Annotation\Route;

    class MainController extends AbstractController {
//        session_status_actions.php

        #[Route('/', name: 'home')]
        public function index(
            Request $request, 
            SessionInterface $session,
            SetStatus $setStatus): Response {

            if (!$session -> has('id') || !$session -> has('status') || !$session -> has('language')){

                $error = $session -> has('error_log_in') ? $session -> get('error_log_in') : null;
                $session -> remove('error_log_in');
            
                return $this -> render('login_page.html.twig', [
                    'error_log_in' => $error,
                ]);
            }

            if ($session -> get('status') !== 'participant'){
                $compStatus = $request -> request -> get('comp_status');

                if ($compStatus || $session -> has('comp_status')){
                    try {
                        $route = $setStatus -> handle($session, $compStatus);
                        return $this -> redirectToRoute($route);
                    } catch (\RuntimeException $e) {
                        return $this -> render('error_page.html.twig', [
                            'message' => $e -> getMessage()
                        ]);
                    }
                } else {
                    return $this -> render('redirection_page.html.twig', [
                        'lang'           => $session -> get('language'),
                        'users_id'       => $session -> get('id'),
                        'id_status'      => $session -> get('id_status'),
                        'is_redirection' => $request -> request -> has('redirection')
                    ]);
                }
            }
        }

        #[Route('/admin', name: 'admin_page')]
        public function admin(): Response {
            return $this -> render('admin.html.twig');
        }

        #[Route('/scoreboard', name: 'scoreboard_page')]
        public function scoreboard(): Response {
            return $this -> render('scoreboard.html.twig');
        }

        #[Route('/order', name: 'order_page')]
        public function order(): Response {
            return $this -> render('order.html.twig');
        }

        #[Route('/bars', name: 'bars_page')]
        public function bars(): Response {
            return $this -> render('bars.html.twig');
        }

        #[Route('/information', name: 'information_page')]
        public function information(): Response {
            return $this -> render('information.html.twig');
        }
        
        #[Route('/timer', name: 'timer_page')]
        public function timer(): Response {
            return $this -> render('timer.html.twig');
        }

        #[Route('/weighingIn', name: 'weighingIn_page')]
        public function weighingIn(): Response {
            return $this -> render('weighingIn.html.twig');
        }
    }
?>