<?php
    namespace App\Controller\Redirection;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class PageController extends AbstractController {
        #[Route(
            '/{page}', 
            name: 'page', 
            requirements: ['page' => 'admin|weighingIn|scoreboard|order|bars|information|timer']
        )]
        public function show(string $page): Response 
        {
            return $this -> render($page.'.html.twig');
        }
    }
?>