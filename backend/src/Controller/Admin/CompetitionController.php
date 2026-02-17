<?php
    namespace App\Controller\Admin;

    use App\Service\Admin\MainPage\Competition\CompetitionContextBuilder;
    use App\Service\Admin\MainPage\Competition\CompetitionService;
    use App\Service\IdempotencyService;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\Routing\Annotation\Route;

    use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
    use Doctrine\ORM\EntityManagerInterface;

    class CompetitionController extends AbstractController {
        #[Route('/api/updateCompetitionData', name: 'update_competition_data', methods: ['POST'])]
        public function updateData(
            CompetitionContextBuilder $builder,
            CompetitionService $service,
            Request $request,
            IdempotencyService $idempotencyService,
            EntityManagerInterface $em
            ): JsonResponse {

            $data = json_decode($request -> getContent(), true);
            $actionId = $data['actionId'] ?? null;

            if (!$actionId) {
                return new JsonResponse(['success' => false], 400); 
            }

            try {
                $idempotencyService -> markAsProcessed($actionId);

                $context = $builder -> build($data);
                $result = $service -> edit($context);

                em ->flush();

                return new JsonResponse($result -> toArray());

            } catch (UniqueConstraintViolationException $e) {
                return new JsonResponse(['success' => true]);
            }
        }
    }
?>