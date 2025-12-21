<?php
    namespace App\Controller;

    use App\Service\Main\ResolverFactory;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;
    use Symfony\Component\Routing\Annotation\Route;

    class MainController extends AbstractController {
        #[Route('/', name: 'home')]
        public function index (
            Request $request, 
            SessionInterface $session,
            ResolverFactory $factory
            ): Response {

            $result = $factory -> resolve($request, $session);

            return $this -> render(
                $result['template'],
                $result['data'] ?? []
            );
        }
    }
?>