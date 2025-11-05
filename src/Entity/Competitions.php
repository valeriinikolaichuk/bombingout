<?php

namespace App\Entity;

use App\Repository\CompetitionsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\User;

#[ORM\Entity(repositoryClass: CompetitionsRepository::class)]
class Competitions {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "comp_id", type: "integer")]
    private ?int $comp_id = null;

    #[ORM\Column(name: "competition_name", length: 150, nullable: true)]
    private ?string $competition_name = null;

    #[ORM\Column(name: "country", length: 60, nullable: true)]
    private ?string $country = null;

    #[ORM\Column(name: "city", length: 60, nullable: true)]
    private ?string $city = null;

    #[ORM\Column(name: "start_date", type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $start_date = null;

    #[ORM\Column(name: "end_date", type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $end_date = null;

    #[ORM\Column(name: "division", length: 8, nullable: true)]
    private ?string $division = null;

    #[ORM\Column(name: "age_group", length: 15, nullable: true)]
    private ?string $age_group = null;

    #[ORM\Column(name: "sex", length: 15, nullable: true)]
    private ?string $sex = null;

    #[ORM\Column(name: "type", length: 30, nullable: true)]
    private ?string $type = null;

    #[ORM\Column(name: "categories", length: 30, nullable: true)]
    private ?string $categories = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'competitions')]
    #[ORM\JoinColumn(name: 'users_id', referencedColumnName: 'id', nullable: false)]
    private ?User $user = null;

    #[ORM\Column(name: "nomination", length: 45, nullable: true)]
    private ?string $nomination = null;

    #[ORM\Column(name: "preliminary", type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $preliminary = null;

    #[ORM\Column(name: "final", type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $final = null;

    public function getCompId(): ?int { return $this->comp_id; }

    public function getCompetitionName(): ?string { return $this->competition_name; }
    public function setCompetitionName(?string $competition_name): static {
        $this->competition_name = $competition_name;
        return $this;
    }

    public function getCountry(): ?string { return $this->country; }
    public function setCountry(?string $country): static {
        $this->country = $country;
        return $this;
    }

    public function getCity(): ?string { return $this->city; }
    public function setCity(?string $city): static {
        $this->city = $city;
        return $this;
    }

    public function getStartDate(): ?\DateTime { return $this->start_date; }
    public function setStartDate(?\DateTime $start_date): static {
        $this->start_date = $start_date;
        return $this;
    }

    public function getEndDate(): ?\DateTime { return $this->end_date; }
    public function setEndDate(?\DateTime $end_date): static {
        $this->end_date = $end_date;
        return $this;
    }

    public function getDivision(): ?string { return $this->division; }
    public function setDivision(?string $division): static
    {
        $this->division = $division;
        return $this;
    }

    public function getAgeGroup(): ?string { return $this->age_group; }
    public function setAgeGroup(?string $age_group): static {
        $this->age_group = $age_group;
        return $this;
    }

    public function getSex(): ?string { return $this->sex; }
    public function setSex(?string $sex): static {
        $this->sex = $sex;
        return $this;
    }

    public function getType(): ?string { return $this->type; }
    public function setType(?string $type): static {
        $this->type = $type;
        return $this;
    }

    public function getCategories(): ?string { return $this->categories; }
    public function setCategories(?string $categories): static {
        $this->categories = $categories;
        return $this;
    }

    public function getUser(): ?User { return $this->user; }
    public function setUser(?User $user): static {
        $this->user = $user;
        return $this;
    }

    public function getNomination(): ?string { return $this->nomination; }
    public function setNomination(?string $nomination): static {
        $this->nomination = $nomination;
        return $this;
    }

    public function getPreliminary(): ?\DateTime { return $this->preliminary; }
    public function setPreliminary(?\DateTime $preliminary): static {
        $this->preliminary = $preliminary;
        return $this;
    }

    public function getFinal(): ?\DateTime { return $this->final; }
    public function setFinal(?\DateTime $final): static {
        $this->final = $final;
        return $this;
    }
}