<?php
    namespace App\Service\Redirection\ShowConnections\GetData;

    use App\Service\Redirection\ShowConnections\UserDataDTO;

    use Symfony\Component\HttpFoundation\Request;

    interface GetDataInterface
    {
        public function supports(Request $request): bool;

        public function getData(UserDataDTO $context, Request $request): void;
    }
?>