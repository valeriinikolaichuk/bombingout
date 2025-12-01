<?php
    namespace App\Controller;

    use App\Service\Login\StatusManager\UserStatusManager;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;
    use Symfony\Component\Routing\Annotation\Route;

    class MainController extends AbstractController {
        #[Route('/', name: 'home')]
        public function index(
            Request $request, 
            SessionInterface $session,
            UserStatusManager $statusManager
            ): Response {

            if (!$session -> has('id') || !$session -> has('status') || !$session -> has('language')){
                return $this -> render('login_page.html.twig');
            }

            return $statusManager -> handleStatus($request, $session);
        }
    }
?>