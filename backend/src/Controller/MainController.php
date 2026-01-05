<?php
    namespace App\Controller;

    use App\Service\Main\ResolverFactory;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class MainController extends AbstractController {
        #[Route('/', name: 'home')]
        public function index (
            Request $request, 
            ResolverFactory $factory
            ): Response {

            $result = $factory -> resolve($request);

            return $this -> render(
                $result['template'],
                $result['data'] ?? []
            );
        }
    }
?>