<?php
    namespace App\Service\Login\StatusTableLogin\DeletePrevRegFiller;

    use App\Service\Login\StatusTableLogin\DeletePrevRegContext;

    use Symfony\Component\HttpFoundation\Request;

    class DeletePrevRegFiller implements DeletePrevRegFillerInterface
    {
        public function supports(Request $request): bool
        {
            $data = json_decode($request->getContent(), true);
            return isset($data['usersId']) || isset($data['usersIp']) || isset($data['usersAgent']);
        }

        public function fill(DeletePrevRegContext $context, Request $request): void
        {
            $data = json_decode($request -> getContent(), true);

            $context -> usersId    = (int) ($data['usersId'] ?? 0);
            $context -> usersIp    = $data['usersIp'] ?? '';
            $context -> usersAgent = $data['usersAgent'] ?? '';

            $context -> valid = $context -> usersId && $context -> usersIp && $context -> usersAgent;
        }
    }
?>