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

    #[ORM\Column(name: "users_ID", type: "integer", nullable: false, options: ["default" => 0])]
    private ?int $users_ID = 0;

    #[ORM\Column(name: "comp_status", length: 60, nullable: false, options: ["default" => ""])]
    private ?string $comp_status = '';

    #[ORM\Column(name: "comp_id", type: "integer", nullable: false, options: ["default" => 0])]
    private ?int $comp_id = 0;

    #[ORM\Column(name: "sessions_name", length: 60, nullable: false, options: ["default" => ""])]
    private ?string $sessions_name = '';

    #[ORM\Column(name: "discipline", length: 60, nullable: false, options: ["default" => ""])]
    private ?string $discipline = '';

    #[ORM\Column(name: "attempt", type: "integer", nullable: false, options: ["default" => 0])]
    private ?int $attempt = 0;

    #[ORM\Column(name: "users_status", length: 45, nullable: false, options: ["default" => ""])]
    private ?string $users_status = '';

    #[ORM\Column(name: "lang", length: 45, nullable: false, options: ["default" => ""])]
    private ?string $lang = '';

    #[ORM\Column(name: "grp_page", length: 120, nullable: false, options: ["default" => ""])]
    private ?string $grp_page = '';

    #[ORM\Column(name: "realtime", type: "datetime", nullable: true)]
    private ?\DateTime $realtime = null;

    #[ORM\Column(name: "ip_address", length: 45, nullable: true)]
    private ?string $ipAddress = null;

    #[ORM\Column(name: "user_agent", length: 255, nullable: true)]
    private ?string $userAgent = null;

    public function getId(): ?int { return $this->id_status; }

    public function getUserID(): int { return $this->users_ID; }
    public function setUserID(int $users_ID): static {
        $this->users_ID = $users_ID;
        return $this;
    }

    public function getCompStatus(): string { return $this->comp_status; }
    public function setCompStatus(string $comp_status): static {
        $this->comp_status = $comp_status;
        return $this;
    }

    public function getCompId(): int { return $this->comp_id; }
    public function setCompId(int $comp_id): static {
        $this->comp_id = $comp_id;
        return $this;
    }

    public function getSessionsName(): string { return $this->sessions_name; }
    public function setSessionsName(string $sessions_name): static {
        $this->sessions_name = $sessions_name;
        return $this;
    }

    public function getDiscipline(): string { return $this->discipline; }
    public function setDiscipline(string $discipline): static {
        $this->discipline = $discipline;
        return $this;
    }

    public function getAttempt(): int { return $this->attempt; }
    public function setAttempt(int $attempt): static{
        $this->attempt = $attempt;
        return $this;
    }

    public function getUsersStatus(): string { return $this->users_status; }
    public function setUsersStatus(string $users_status): static {
        $this->users_status = $users_status;
        return $this;
    }

    public function getLang(): string { return $this->lang; }
    public function setLang(string $lang): static {
        $this->lang = $lang;
        return $this;
    }

    public function getGrpPage(): string { return $this->grp_page; }
    public function setGrpPage(string $grp_page): static {
        $this->grp_page = $grp_page;
        return $this;
    }

    public function getRealtime(): ?\DateTime { return $this->realtime; }
    public function setRealtime(?\DateTime $realtime): static {
        $this->realtime = $realtime;
        return $this;
    }

    public function getIpAddress(): ?string { return $this->ip_address ?? ''; }
    public function setIpAddress(?string $ip_address): static { 
        $this->ip_address = $ip_address; 
        return $this; }

    public function getUserAgent(): ?string { return $this->user_agent ?? ''; }
    public function setUserAgent(?string $user_agent): static { 
        $this->user_agent = $user_agent; 
        return $this; }
}