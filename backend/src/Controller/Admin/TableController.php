<?php
    namespace App\Controller\Admin;

    use App\Service\Admin\Tables\TableContextBuilder;
    use App\Service\Admin\Tables\TableService;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class TableController extends AbstractController {
        #[Route('/tableController', name: 'table', methods: ['GET', 'POST'])]
        public function loadTable(
            TableContextBuilder $builder,
            TableService $service,
            Request $request, 
            ): Response {

            $data = json_decode($request -> getContent(), true);

            $context = $builder -> build($data);
            $result = $service -> tableResolver($context);

            return $this -> render(
                $result['table'],
                $result['data'] ?? []
            );
        }
    }
?>