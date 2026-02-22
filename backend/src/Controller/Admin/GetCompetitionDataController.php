<?php
    namespace App\Controller\Admin;

    use App\Service\Admin\MainPage\GetCompetitionData\CompetitionDataBuilder;
    use App\Service\Admin\MainPage\GetCompetitionData\CompetitionDataService;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\Routing\Annotation\Route;

    class GetCompetitionDataController extends AbstractController {
        #[Route('/api/getCompetitionData', name: 'get_competition_data', methods: ['POST'])]
        public function getCompetition(
            CompetitionDataBuilder $builder,
            CompetitionDataService $service,
            Request $request
            ): JsonResponse {

            $data = json_decode($request -> getContent(), true);

            $context = $builder -> build($data);
            $result = $service -> execute($context);

            return new JsonResponse(
                $result -> toArray()
            );
        }
    }
?>