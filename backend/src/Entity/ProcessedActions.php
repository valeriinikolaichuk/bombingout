<?php

namespace App\Entity;

use App\Repository\ProcessedActionsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProcessedActionsRepository::class)]
#[ORM\Table(
    name: 'processed_actions',
    uniqueConstraints: [
        new ORM\UniqueConstraint(name: 'uniq_action_id', columns: ['action_id'])
    ]
)]
class ProcessedActions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(name: 'action_id', length: 36, nullable: false)]
    private string $actionId;

    #[ORM\Column(name: 'created_at', nullable: false)]
    private \DateTimeImmutable $createdAt;

    public function __construct(string $actionId)
    {
        $this->actionId = $actionId;
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActionId(): string
    {
        return $this->actionId;
    }

    public function setActionId(string $actionId): static
    {
        $this->actionId = $actionId;

        return $this;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}