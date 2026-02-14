<?php

namespace App\Entity;

use App\Repository\SessionsTableRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SessionsTableRepository::class)]
class SessionsTable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_sessions = null;

    #[ORM\Column]
    private ?int $comp_id = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $all_sessions = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $sessions_name = null;

    #[ORM\Column(nullable: true)]
    private ?int $grp = null;

    #[ORM\Column(nullable: true)]
    private ?int $category = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $dateTime = null;

    public function getId(): ?int
    {
        return $this->id_sessions;
    }

    public function getCompId(): ?int
    {
        return $this->comp_id;
    }

    public function setCompId(int $comp_id): static
    {
        $this->comp_id = $comp_id;

        return $this;
    }

    public function getAllSessions(): ?string
    {
        return $this->all_sessions;
    }

    public function setAllSessions(?string $all_sessions): static
    {
        $this->all_sessions = $all_sessions;

        return $this;
    }

    public function getSessionsName(): ?string
    {
        return $this->sessions_name;
    }

    public function setSessionsName(?string $sessions_name): static
    {
        $this->sessions_name = $sessions_name;

        return $this;
    }

    public function getGrp(): ?int
    {
        return $this->grp;
    }

    public function setGrp(?int $grp): static
    {
        $this->grp = $grp;

        return $this;
    }

    public function getCategory(): ?int
    {
        return $this->category;
    }

    public function setCategory(?int $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getDateTime(): ?\DateTime
    {
        return $this->dateTime;
    }

    public function setDateTime(?\DateTime $dateTime): static
    {
        $this->dateTime = $dateTime;

        return $this;
    }
}
