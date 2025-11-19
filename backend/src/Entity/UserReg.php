<?php

namespace App\Entity;

use App\Repository\UserRegRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRegRepository::class)]
class UserReg
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id")]
    private ?int $id = null;

    #[ORM\Column(name: "user", length: 50, nullable: true)]
    private ?string $username = null;

    #[ORM\Column(name: "password", length: 255, nullable: true)]
    private ?string $password = null;

    #[ORM\Column(name: "status", length: 12, nullable: true)]
    private ?string $status = null;

    #[ORM\Column(name: "nominations_id", nullable: true)]
    private ?int $nominations_id = null;

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

    public function getNominationsId(): ?int { return $this->nominations_id; }
    public function setNominationsId(?int $nominations_id): static {
        $this->nominations_id = $nominations_id;
        return $this;
    }
}
