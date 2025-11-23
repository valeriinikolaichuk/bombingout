<?php

namespace App\Entity;

use App\Repository\ComputerStatusRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComputerStatusRepository::class)]
class ComputerStatus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id_status")]
    private ?int $id_status = null;

    #[ORM\Column(name: "user_ID")]
    private ?int $user_ID = null;

    #[ORM\Column(name: "comp_status", length: 60)]
    private ?string $comp_status = null;

    #[ORM\Column(name: "comp_id")]
    private ?int $comp_id = null;

    #[ORM\Column(name: "sessions_name", length: 60)]
    private ?string $sessions_name = null;

    #[ORM\Column(name: "discipline", length: 60)]
    private ?string $discipline = null;

    #[ORM\Column(name: "attempt")]
    private ?int $attempt = null;

    #[ORM\Column(name: "users_status", length: 45)]
    private ?string $users_status = null;

    #[ORM\Column(name: "lang", length: 45)]
    private ?string $lang = null;

    #[ORM\Column(name: "grp_page", length: 120)]
    private ?string $grp_page = null;

    #[ORM\Column(name: "ip_address", length: 45)]
    private ?string $ipAddress = null;

    #[ORM\Column(name: "user_agent", length: 255)]
    private ?string $userAgent = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $realtime = null;

    public function getId(): ?int { return $this->id_status; }

    public function getUserID(): ?int { return $this->user_ID; }
    public function setUserID(int $user_ID): static {
        $this->user_ID = $user_ID;
        return $this;
    }

    public function getCompStatus(): ?string { return $this->comp_status; }
    public function setCompStatus(string $comp_status): static {
        $this->comp_status = $comp_status;
        return $this;
    }

    public function getCompId(): ?int { return $this->comp_id; }
    public function setCompId(int $comp_id): static {
        $this->comp_id = $comp_id;
        return $this;
    }

    public function getSessionsName(): ?string { return $this->sessions_name; }
    public function setSessionsName(string $sessions_name): static {
        $this->sessions_name = $sessions_name;
        return $this;
    }

    public function getDiscipline(): ?string { return $this->discipline; }
    public function setDiscipline(string $discipline): static {
        $this->discipline = $discipline;
        return $this;
    }

    public function getAttempt(): ?int { return $this->attempt; }
    public function setAttempt(int $attempt): static{
        $this->attempt = $attempt;
        return $this;
    }

    public function getUsersStatus(): ?string { return $this->users_status; }
    public function setUsersStatus(string $users_status): static {
        $this->users_status = $users_status;
        return $this;
    }

    public function getLang(): ?string { return $this->lang; }
    public function setLang(string $lang): static {
        $this->lang = $lang;
        return $this;
    }

    public function getGrpPage(): ?string { return $this->grp_page; }
    public function setGrpPage(string $grp_page): static {
        $this->grp_page = $grp_page;
        return $this;
    }

    public function getRealtime(): ?\DateTime { return $this->realtime; }
    public function setRealtime(?\DateTime $realtime): static {
        $this->realtime = $realtime;
        return $this;
    }

    public function getIpAddress(): ?string { return $this->ip_address; }
    public function setIpAddress(?string $ip): self { 
        $this->ip_address = $ip; 
        return $this; }

    public function getUserAgent(): ?string { return $this->user_agent; }
    public function setUserAgent(?string $ua): self { 
        $this->user_agent = $ua; 
        return $this; }

}
