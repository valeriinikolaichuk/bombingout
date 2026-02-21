<?php
    namespace App\Controller\Admin;

    use App\Service\Admin\MainPage\UpdateCompetition\CompetitionContextBuilder;
    use App\Service\Admin\MainPage\UpdateCompetition\CompetitionService;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\Routing\Annotation\Route;

    class UpdateCompetitionController extends AbstractController {
        #[Route('/api/updateCompetitionData', name: 'update_competition_data', methods: ['POST'])]
        public function updateData(
            CompetitionContextBuilder $builder,
            CompetitionService $service,
            Request $request,
            ): JsonResponse {

            $data = json_decode($request -> getContent(), true);

            $context = $builder -> build($data);
            $result = $service -> edit($context);

            return new JsonResponse(
                $result -> toArray()
            );
        }
    }
?>