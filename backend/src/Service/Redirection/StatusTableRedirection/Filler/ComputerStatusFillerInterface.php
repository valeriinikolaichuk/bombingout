<?php
    namespace App\Service\Redirection\StatusTableRedirection\Filler;

    use App\Service\Redirection\StatusTableRedirection\ComputerStatusContext;

    use Symfony\Component\HttpFoundation\Request;

    interface ComputerStatusFillerInterface
    {
        public function supports(Request $request): bool;

        public function fill(ComputerStatusContext $context, Request $request): void;
    }
?>