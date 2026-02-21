<?php
    namespace App\Service;

    use App\Entity\ProcessedActions;

    use Doctrine\ORM\EntityManagerInterface;

    class IdempotencyService
    {
        public function __construct(
            private EntityManagerInterface $em
        ) {}

        public function markAsProcessed(string $actionId): void
        {
            $processed = new ProcessedActions($actionId);

            $processed ->setActionId($actionId);
            $processed ->setCreatedAt(new \DateTimeImmutable());

            $this -> em->persist($processed);
        }
    }
?>