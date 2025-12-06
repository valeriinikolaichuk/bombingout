<?php
    namespace App\Controller;

    use App\Service\Login\LoginPage\LoginPageInterface;
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
            LoginPageInterface $loginResolver,
            UserStatusManager $statusManager
            ): Response {

            if ($loginResolver -> supports($session)){
                return $this -> render($loginResolver -> getLoginPage());
            }

            $givePage = $statusManager -> handleStatus($request, $session);

            if ($givePage['template'] === 'error.html.twig'){
                throw $this -> createNotFoundException($givePage);
            }

            return $this -> render($givePage['template'], $givePage['data']);
        }
    }
?>