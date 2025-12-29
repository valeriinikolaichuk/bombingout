<?php
    namespace App\Service\ShowConnections\GetData;

    use App\Service\ShowConnections\UserDataDTO;

    use Symfony\Component\HttpFoundation\Request;

    interface GetDataInterface
    {
        public function supports(Request $request): bool;

        public function getData(UserDataDTO $context, Request $request): void;
    }
?>