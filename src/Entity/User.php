<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\Competitions;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id")]
    private ?int $id = null;

    #[ORM\Column(name: "user", length: 30, nullable: true)]
    private ?string $username = null;

    #[ORM\Column(name: "password", length: 30, nullable: true)]
    private ?string $password = null;

    #[ORM\Column(name: "status", length: 12, nullable: true)]
    private ?string $status = null;

    #[ORM\Column(name: "time", nullable: true)]
    private ?\DateTime $time = null;

    #[ORM\Column(name: "blocked", length: 7, nullable: true)]
    private ?string $blocked = null;

    #[ORM\Column(name: "nominations_id")]
    private ?int $nominations_id = null;

    #[ORM\Column(name: "team", length: 45)]
    private ?string $team = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Competitions::class)]
    private Collection $competitions;
    
    public function __construct(){
        $this -> competitions = new ArrayCollection();
    }

    public function getId(): ?int { return $this->id; }

    public function getUsername(): ?string { return $this->username; }

    public function setUsername(?string $username): static {
        $this->username = $username;
        return $this;
    }

    public function getPassword(): ?string { return $this->password; }
    public function setPassword(?string $password): static {
        $this->password = $password;
        return $this;
    }

    public function getStatus(): ?string { return $this->status; }
    public function setStatus(?string $status): static {
        $this->status = $status;
        return $this;
    }

    public function getTime(): ?\DateTime { return $this->time; }
    public function setTime(?\DateTime $time): static {
        $this->time = $time;
        return $this;
    }

    public function getBlocked(): ?string { return $this->blocked; }
    public function setBlocked(?string $blocked): static {
        $this->blocked = $blocked;
        return $this;
    }

    public function getNominationsId(): ?int { return $this->nominations_id; }
    public function setNominationsId(int $nominations_id): static {
        $this->nominations_id = $nominations_id;
        return $this;
    }

    public function getTeam(): ?string { return $this->team; }
    public function setTeam(string $team): static {
        $this->team = $team;
        return $this;
    }

    public function getCompetitions(): Collection { return $this->competitions; }
    public function addCompetition(Competitions $competition): self {
        if (!$this->competitions->contains($competition)) {
            $this->competitions->add($competition);
            $competition->setUser($this);
        }
        return $this;
    }

    public function removeCompetition(Competitions $competition): self {
        if ($this->competitions->removeElement($competition)) {
            if ($competition->getUser() === $this) {
                $competition->setUser(null);
            }
        }
        return $this;
    }
}
