<?php

namespace App\Entity;

use App\Repository\MainTableRepository;
use App\Entity\Competitions;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MainTableRepository::class)]
class MainTable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $main_id = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $surname_name = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $date_of_birth = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2, nullable: true)]
    private ?string $bodyweight = null;

    #[ORM\Column(length: 45, nullable: true)]
    private ?string $category = null;

    #[ORM\Column(nullable: true)]
    private ?int $category_num = null;

    #[ORM\Column]
    private ?int $grp = null;

    #[ORM\Column(nullable: true)]
    private ?int $lot = null;

    #[ORM\Column(length: 45, nullable: true)]
    private ?string $rank_class = null;

    #[ORM\Column(length: 45, nullable: true)]
    private ?string $region = null;

    #[ORM\Column(length: 45, nullable: true)]
    private ?string $city = null;

    #[ORM\Column(length: 45, nullable: true)]
    private ?string $club = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $trener_1 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $trener_2 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $trener_3 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $trener_4 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titles = null;

    #[ORM\Column(nullable: true)]
    private ?int $personally = null;

    #[ORM\Column(nullable: true)]
    private ?int $out_of_comp = null;

    #[ORM\Column(nullable: true)]
    private ?int $md = null;

    #[ORM\Column(nullable: true)]
    private ?int $dbl = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $squat_nom = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $bench_press_nom = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $deadlift_nom = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 1)]
    private ?string $total_nom = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $squat_1 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $squat_1_res = null;

    #[ORM\Column(length: 100)]
    private ?string $squat_1_CSS = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $squat_1_fcst = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $squat_2 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $squat_2_res = null;

    #[ORM\Column(length: 100)]
    private ?string $squat_2_CSS = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $squat_2_fcst = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $squat_3 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $squat_3_res = null;

    #[ORM\Column(length: 100)]
    private ?string $squat_3_CSS = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $squat_3_fcst = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $squat_4 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $squat_4_res = null;

    #[ORM\Column(length: 100)]
    private ?string $squat_4_CSS = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $squat_4_fcst = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $squat_res = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $squat_fcst = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $bench_press_1 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $bench_press_1_res = null;

    #[ORM\Column(length: 100)]
    private ?string $bench_press_1_CSS = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $bench_press_1_fcst = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $bench_press_2 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $bench_press_2_res = null;

    #[ORM\Column(length: 100)]
    private ?string $bench_press_2_CSS = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $bench_press_2_fcst = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $bench_press_3 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $bench_press_3_res = null;

    #[ORM\Column(length: 100)]
    private ?string $bench_press_3_CSS = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $bench_press_3_fcst = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $bench_press_4 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $bench_press_4_res = null;

    #[ORM\Column(length: 100)]
    private ?string $bench_press_4_CSS = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $bench_press_4_fcst = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $bench_press_res = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $bench_press_fcst = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $deadlift_1 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $deadlift_1_res = null;

    #[ORM\Column(length: 100)]
    private ?string $deadlift_1_CSS = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $deadlift_1_fcst = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $deadlift_2 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $deadlift_2_res = null;

    #[ORM\Column(length: 100)]
    private ?string $deadlift_2_CSS = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $deadlift_2_fcst = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $deadlift_3 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $deadlift_3_res = null;

    #[ORM\Column(length: 100)]
    private ?string $deadlift_3_CSS = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $deadlift_3_fcst = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $deadlift_4 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $deadlift_4_res = null;

    #[ORM\Column(length: 100)]
    private ?string $deadlift_4_CSS = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $deadlift_4_fcst = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $deadlift_res = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1)]
    private ?string $deadlift_fcst = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 1)]
    private ?string $total_1_att = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 1)]
    private ?string $total = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 1)]
    private ?string $total_fcst = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 4)]
    private ?string $coef = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $coef_squat = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $coef_squat_fcst = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $coef_bench_press = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $coef_bench_press_fcst = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $coef_deadlift = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $coef_deadlift_fcst = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $coef_total = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $coef_total_fcst = null;

    #[ORM\Column(nullable: true)]
    private ?int $squat_rnk = null;

    #[ORM\Column(nullable: true)]
    private ?int $squat_rnk_fcst = null;

    #[ORM\Column(nullable: true)]
    private ?int $bench_press_rnk = null;

    #[ORM\Column(nullable: true)]
    private ?int $bench_press_rnk_fcst = null;

    #[ORM\Column(nullable: true)]
    private ?int $deadlift_rnk = null;

    #[ORM\Column(nullable: true)]
    private ?int $deadlift_rnk_fcst = null;

    #[ORM\Column(nullable: true)]
    private ?int $ranking = null;

    #[ORM\Column(nullable: true)]
    private ?int $rnk_fcst = null;

    #[ORM\Column(nullable: true)]
    private ?int $points = null;

    #[ORM\Column(nullable: true)]
    private ?int $points_bp = null;

    #[ORM\ManyToOne(targetEntity: Competitions::class)]
    #[ORM\JoinColumn(name: "comp_id", referencedColumnName: "comp_id", nullable: false)]
    private ?Competitions $competition = null;

    public function getId(): ?int
    {
        return $this->main_id;
    }

    public function getSurnameName(): ?string
    {
        return $this->surname_name;
    }

    public function setSurnameName(?string $surname_name): static
    {
        $this->surname_name = $surname_name;

        return $this;
    }

    public function getDateOfBirth(): ?string
    {
        return $this->date_of_birth;
    }

    public function setDateOfBirth(?string $date_of_birth): static
    {
        $this->date_of_birth = $date_of_birth;

        return $this;
    }

    public function getBodyweight(): ?string
    {
        return $this->bodyweight;
    }

    public function setBodyweight(?string $bodyweight): static
    {
        $this->bodyweight = $bodyweight;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getCategoryNum(): ?int
    {
        return $this->category_num;
    }

    public function setCategoryNum(?int $category_num): static
    {
        $this->category_num = $category_num;

        return $this;
    }

    public function getGrp(): ?int
    {
        return $this->grp;
    }

    public function setGrp(int $grp): static
    {
        $this->grp = $grp;

        return $this;
    }

    public function getLot(): ?int
    {
        return $this->lot;
    }

    public function setLot(?int $lot): static
    {
        $this->lot = $lot;

        return $this;
    }

    public function getRankClass(): ?string
    {
        return $this->rank_class;
    }

    public function setRankClass(?string $rank_class): static
    {
        $this->rank_class = $rank_class;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(?string $region): static
    {
        $this->region = $region;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getClub(): ?string
    {
        return $this->club;
    }

    public function setClub(?string $club): static
    {
        $this->club = $club;

        return $this;
    }

    public function getTrener1(): ?string
    {
        return $this->trener_1;
    }

    public function setTrener1(?string $trener_1): static
    {
        $this->trener_1 = $trener_1;

        return $this;
    }

    public function getTrener2(): ?string
    {
        return $this->trener_2;
    }

    public function setTrener2(?string $trener_2): static
    {
        $this->trener_2 = $trener_2;

        return $this;
    }

    public function getTrener3(): ?string
    {
        return $this->trener_3;
    }

    public function setTrener3(?string $trener_3): static
    {
        $this->trener_3 = $trener_3;

        return $this;
    }

    public function getTrener4(): ?string
    {
        return $this->trener_4;
    }

    public function setTrener4(?string $trener_4): static
    {
        $this->trener_4 = $trener_4;

        return $this;
    }

    public function getTitles(): ?string
    {
        return $this->titles;
    }

    public function setTitles(?string $titles): static
    {
        $this->titles = $titles;

        return $this;
    }

    public function getPersonally(): ?int
    {
        return $this->personally;
    }

    public function setPersonally(?int $personally): static
    {
        $this->personally = $personally;

        return $this;
    }

    public function getOutOfComp(): ?int
    {
        return $this->out_of_comp;
    }

    public function setOutOfComp(?int $out_of_comp): static
    {
        $this->out_of_comp = $out_of_comp;

        return $this;
    }

    public function getMd(): ?int
    {
        return $this->md;
    }

    public function setMd(?int $md): static
    {
        $this->md = $md;

        return $this;
    }

    public function getDbl(): ?int
    {
        return $this->dbl;
    }

    public function setDbl(?int $dbl): static
    {
        $this->dbl = $dbl;

        return $this;
    }

    public function getSquatNom(): ?string
    {
        return $this->squat_nom;
    }

    public function setSquatNom(string $squat_nom): static
    {
        $this->squat_nom = $squat_nom;

        return $this;
    }

    public function getBenchPressNom(): ?string
    {
        return $this->bench_press_nom;
    }

    public function setBenchPressNom(string $bench_press_nom): static
    {
        $this->bench_press_nom = $bench_press_nom;

        return $this;
    }

    public function getDeadliftNom(): ?string
    {
        return $this->deadlift_nom;
    }

    public function setDeadliftNom(string $deadlift_nom): static
    {
        $this->deadlift_nom = $deadlift_nom;

        return $this;
    }

    public function getTotalNom(): ?string
    {
        return $this->total_nom;
    }

    public function setTotalNom(string $total_nom): static
    {
        $this->total_nom = $total_nom;

        return $this;
    }

    public function getSquat1(): ?string
    {
        return $this->squat_1;
    }

    public function setSquat1(string $squat_1): static
    {
        $this->squat_1 = $squat_1;

        return $this;
    }

    public function getSquat1Res(): ?string
    {
        return $this->squat_1_res;
    }

    public function setSquat1Res(string $squat_1_res): static
    {
        $this->squat_1_res = $squat_1_res;

        return $this;
    }

    public function getSquat1CSS(): ?string
    {
        return $this->squat_1_CSS;
    }

    public function setSquat1CSS(string $squat_1_CSS): static
    {
        $this->squat_1_CSS = $squat_1_CSS;

        return $this;
    }

    public function getSquat1Fcst(): ?string
    {
        return $this->squat_1_fcst;
    }

    public function setSquat1Fcst(string $squat_1_fcst): static
    {
        $this->squat_1_fcst = $squat_1_fcst;

        return $this;
    }

    public function getSquat2(): ?string
    {
        return $this->squat_2;
    }

    public function setSquat2(string $squat_2): static
    {
        $this->squat_2 = $squat_2;

        return $this;
    }

    public function getSquat2Res(): ?string
    {
        return $this->squat_2_res;
    }

    public function setSquat2Res(string $squat_2_res): static
    {
        $this->squat_2_res = $squat_2_res;

        return $this;
    }

    public function getSquat2CSS(): ?string
    {
        return $this->squat_2_CSS;
    }

    public function setSquat2CSS(string $squat_2_CSS): static
    {
        $this->squat_2_CSS = $squat_2_CSS;

        return $this;
    }

    public function getSquat2Fcst(): ?string
    {
        return $this->squat_2_fcst;
    }

    public function setSquat2Fcst(string $squat_2_fcst): static
    {
        $this->squat_2_fcst = $squat_2_fcst;

        return $this;
    }

    public function getSquat3(): ?string
    {
        return $this->squat_3;
    }

    public function setSquat3(string $squat_3): static
    {
        $this->squat_3 = $squat_3;

        return $this;
    }

    public function getSquat3Res(): ?string
    {
        return $this->squat_3_res;
    }

    public function setSquat3Res(string $squat_3_res): static
    {
        $this->squat_3_res = $squat_3_res;

        return $this;
    }

    public function getSquat3CSS(): ?string
    {
        return $this->squat_3_CSS;
    }

    public function setSquat3CSS(string $squat_3_CSS): static
    {
        $this->squat_3_CSS = $squat_3_CSS;

        return $this;
    }

    public function getSquat3Fcst(): ?string
    {
        return $this->squat_3_fcst;
    }

    public function setSquat3Fcst(string $squat_3_fcst): static
    {
        $this->squat_3_fcst = $squat_3_fcst;

        return $this;
    }

    public function getSquat4(): ?string
    {
        return $this->squat_4;
    }

    public function setSquat4(string $squat_4): static
    {
        $this->squat_4 = $squat_4;

        return $this;
    }

    public function getSquat4Res(): ?string
    {
        return $this->squat_4_res;
    }

    public function setSquat4Res(string $squat_4_res): static
    {
        $this->squat_4_res = $squat_4_res;

        return $this;
    }

    public function getSquat4CSS(): ?string
    {
        return $this->squat_4_CSS;
    }

    public function setSquat4CSS(string $squat_4_CSS): static
    {
        $this->squat_4_CSS = $squat_4_CSS;

        return $this;
    }

    public function getSquat4Fcst(): ?string
    {
        return $this->squat_4_fcst;
    }

    public function setSquat4Fcst(string $squat_4_fcst): static
    {
        $this->squat_4_fcst = $squat_4_fcst;

        return $this;
    }

    public function getSquatRes(): ?string
    {
        return $this->squat_res;
    }

    public function setSquatRes(string $squat_res): static
    {
        $this->squat_res = $squat_res;

        return $this;
    }

    public function getSquatFcst(): ?string
    {
        return $this->squat_fcst;
    }

    public function setSquatFcst(string $squat_fcst): static
    {
        $this->squat_fcst = $squat_fcst;

        return $this;
    }

    public function getBenchPress1(): ?string
    {
        return $this->bench_press_1;
    }

    public function setBenchPress1(string $bench_press_1): static
    {
        $this->bench_press_1 = $bench_press_1;

        return $this;
    }

    public function getBenchPress1Res(): ?string
    {
        return $this->bench_press_1_res;
    }

    public function setBenchPress1Res(string $bench_press_1_res): static
    {
        $this->bench_press_1_res = $bench_press_1_res;

        return $this;
    }

    public function getBenchPress1CSS(): ?string
    {
        return $this->bench_press_1_CSS;
    }

    public function setBenchPress1CSS(string $bench_press_1_CSS): static
    {
        $this->bench_press_1_CSS = $bench_press_1_CSS;

        return $this;
    }

    public function getBenchPress1Fcst(): ?string
    {
        return $this->bench_press_1_fcst;
    }

    public function setBenchPress1Fcst(string $bench_press_1_fcst): static
    {
        $this->bench_press_1_fcst = $bench_press_1_fcst;

        return $this;
    }

    public function getBenchPress2(): ?string
    {
        return $this->bench_press_2;
    }

    public function setBenchPress2(string $bench_press_2): static
    {
        $this->bench_press_2 = $bench_press_2;

        return $this;
    }

    public function getBenchPress2Res(): ?string
    {
        return $this->bench_press_2_res;
    }

    public function setBenchPress2Res(string $bench_press_2_res): static
    {
        $this->bench_press_2_res = $bench_press_2_res;

        return $this;
    }

    public function getBenchPress2CSS(): ?string
    {
        return $this->bench_press_2_CSS;
    }

    public function setBenchPress2CSS(string $bench_press_2_CSS): static
    {
        $this->bench_press_2_CSS = $bench_press_2_CSS;

        return $this;
    }

    public function getBenchPress2Fcst(): ?string
    {
        return $this->bench_press_2_fcst;
    }

    public function setBenchPress2Fcst(string $bench_press_2_fcst): static
    {
        $this->bench_press_2_fcst = $bench_press_2_fcst;

        return $this;
    }

    public function getBenchPress3(): ?string
    {
        return $this->bench_press_3;
    }

    public function setBenchPress3(string $bench_press_3): static
    {
        $this->bench_press_3 = $bench_press_3;

        return $this;
    }

    public function getBenchPress3Res(): ?string
    {
        return $this->bench_press_3_res;
    }

    public function setBenchPress3Res(string $bench_press_3_res): static
    {
        $this->bench_press_3_res = $bench_press_3_res;

        return $this;
    }

    public function getBenchPress3CSS(): ?string
    {
        return $this->bench_press_3_CSS;
    }

    public function setBenchPress3CSS(string $bench_press_3_CSS): static
    {
        $this->bench_press_3_CSS = $bench_press_3_CSS;

        return $this;
    }

    public function getBenchPress3Fcst(): ?string
    {
        return $this->bench_press_3_fcst;
    }

    public function setBenchPress3Fcst(string $bench_press_3_fcst): static
    {
        $this->bench_press_3_fcst = $bench_press_3_fcst;

        return $this;
    }

    public function getBenchPress4(): ?string
    {
        return $this->bench_press_4;
    }

    public function setBenchPress4(string $bench_press_4): static
    {
        $this->bench_press_4 = $bench_press_4;

        return $this;
    }

    public function getBenchPress4Res(): ?string
    {
        return $this->bench_press_4_res;
    }

    public function setBenchPress4Res(string $bench_press_4_res): static
    {
        $this->bench_press_4_res = $bench_press_4_res;

        return $this;
    }

    public function getBenchPress4CSS(): ?string
    {
        return $this->bench_press_4_CSS;
    }

    public function setBenchPress4CSS(string $bench_press_4_CSS): static
    {
        $this->bench_press_4_CSS = $bench_press_4_CSS;

        return $this;
    }

    public function getBenchPress4Fcst(): ?string
    {
        return $this->bench_press_4_fcst;
    }

    public function setBenchPress4Fcst(string $bench_press_4_fcst): static
    {
        $this->bench_press_4_fcst = $bench_press_4_fcst;

        return $this;
    }

    public function getBenchPressRes(): ?string
    {
        return $this->bench_press_res;
    }

    public function setBenchPressRes(string $bench_press_res): static
    {
        $this->bench_press_res = $bench_press_res;

        return $this;
    }

    public function getBenchPressFcst(): ?string
    {
        return $this->bench_press_fcst;
    }

    public function setBenchPressFcst(string $bench_press_fcst): static
    {
        $this->bench_press_fcst = $bench_press_fcst;

        return $this;
    }

    public function getDeadlift1(): ?string
    {
        return $this->deadlift_1;
    }

    public function setDeadlift1(string $deadlift_1): static
    {
        $this->deadlift_1 = $deadlift_1;

        return $this;
    }

    public function getDeadlift1Res(): ?string
    {
        return $this->deadlift_1_res;
    }

    public function setDeadlift1Res(string $deadlift_1_res): static
    {
        $this->deadlift_1_res = $deadlift_1_res;

        return $this;
    }

    public function getDeadlift1CSS(): ?string
    {
        return $this->deadlift_1_CSS;
    }

    public function setDeadlift1CSS(string $deadlift_1_CSS): static
    {
        $this->deadlift_1_CSS = $deadlift_1_CSS;

        return $this;
    }

    public function getDeadlift1Fcst(): ?string
    {
        return $this->deadlift_1_fcst;
    }

    public function setDeadlift1Fcst(string $deadlift_1_fcst): static
    {
        $this->deadlift_1_fcst = $deadlift_1_fcst;

        return $this;
    }

    public function getDeadlift2(): ?string
    {
        return $this->deadlift_2;
    }

    public function setDeadlift2(string $deadlift_2): static
    {
        $this->deadlift_2 = $deadlift_2;

        return $this;
    }

    public function getDeadlift2Res(): ?string
    {
        return $this->deadlift_2_res;
    }

    public function setDeadlift2Res(string $deadlift_2_res): static
    {
        $this->deadlift_2_res = $deadlift_2_res;

        return $this;
    }

    public function getDeadlift2CSS(): ?string
    {
        return $this->deadlift_2_CSS;
    }

    public function setDeadlift2CSS(string $deadlift_2_CSS): static
    {
        $this->deadlift_2_CSS = $deadlift_2_CSS;

        return $this;
    }

    public function getDeadlift2Fcst(): ?string
    {
        return $this->deadlift_2_fcst;
    }

    public function setDeadlift2Fcst(string $deadlift_2_fcst): static
    {
        $this->deadlift_2_fcst = $deadlift_2_fcst;

        return $this;
    }

    public function getDeadlift3(): ?string
    {
        return $this->deadlift_3;
    }

    public function setDeadlift3(string $deadlift_3): static
    {
        $this->deadlift_3 = $deadlift_3;

        return $this;
    }

    public function getDeadlift3Res(): ?string
    {
        return $this->deadlift_3_res;
    }

    public function setDeadlift3Res(string $deadlift_3_res): static
    {
        $this->deadlift_3_res = $deadlift_3_res;

        return $this;
    }

    public function getDeadlift3CSS(): ?string
    {
        return $this->deadlift_3_CSS;
    }

    public function setDeadlift3CSS(string $deadlift_3_CSS): static
    {
        $this->deadlift_3_CSS = $deadlift_3_CSS;

        return $this;
    }

    public function getDeadlift3Fcst(): ?string
    {
        return $this->deadlift_3_fcst;
    }

    public function setDeadlift3Fcst(string $deadlift_3_fcst): static
    {
        $this->deadlift_3_fcst = $deadlift_3_fcst;

        return $this;
    }

    public function getDeadlift4(): ?string
    {
        return $this->deadlift_4;
    }

    public function setDeadlift4(string $deadlift_4): static
    {
        $this->deadlift_4 = $deadlift_4;

        return $this;
    }

    public function getDeadlift4Res(): ?string
    {
        return $this->deadlift_4_res;
    }

    public function setDeadlift4Res(string $deadlift_4_res): static
    {
        $this->deadlift_4_res = $deadlift_4_res;

        return $this;
    }

    public function getDeadlift4CSS(): ?string
    {
        return $this->deadlift_4_CSS;
    }

    public function setDeadlift4CSS(string $deadlift_4_CSS): static
    {
        $this->deadlift_4_CSS = $deadlift_4_CSS;

        return $this;
    }

    public function getDeadlift4Fcst(): ?string
    {
        return $this->deadlift_4_fcst;
    }

    public function setDeadlift4Fcst(string $deadlift_4_fcst): static
    {
        $this->deadlift_4_fcst = $deadlift_4_fcst;

        return $this;
    }

    public function getDeadliftRes(): ?string
    {
        return $this->deadlift_res;
    }

    public function setDeadliftRes(string $deadlift_res): static
    {
        $this->deadlift_res = $deadlift_res;

        return $this;
    }

    public function getDeadliftFcst(): ?string
    {
        return $this->deadlift_fcst;
    }

    public function setDeadliftFcst(string $deadlift_fcst): static
    {
        $this->deadlift_fcst = $deadlift_fcst;

        return $this;
    }

    public function getTotal1Att(): ?string
    {
        return $this->total_1_att;
    }

    public function setTotal1Att(string $total_1_att): static
    {
        $this->total_1_att = $total_1_att;

        return $this;
    }

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(string $total): static
    {
        $this->total = $total;

        return $this;
    }

    public function getTotalFcst(): ?string
    {
        return $this->total_fcst;
    }

    public function setTotalFcst(string $total_fcst): static
    {
        $this->total_fcst = $total_fcst;

        return $this;
    }

    public function getCoef(): ?string
    {
        return $this->coef;
    }

    public function setCoef(string $coef): static
    {
        $this->coef = $coef;

        return $this;
    }

    public function getCoefSquat(): ?string
    {
        return $this->coef_squat;
    }

    public function setCoefSquat(string $coef_squat): static
    {
        $this->coef_squat = $coef_squat;

        return $this;
    }

    public function getCoefSquatFcst(): ?string
    {
        return $this->coef_squat_fcst;
    }

    public function setCoefSquatFcst(string $coef_squat_fcst): static
    {
        $this->coef_squat_fcst = $coef_squat_fcst;

        return $this;
    }

    public function getCoefBenchPress(): ?string
    {
        return $this->coef_bench_press;
    }

    public function setCoefBenchPress(string $coef_bench_press): static
    {
        $this->coef_bench_press = $coef_bench_press;

        return $this;
    }

    public function getCoefBenchPressFcst(): ?string
    {
        return $this->coef_bench_press_fcst;
    }

    public function setCoefBenchPressFcst(string $coef_bench_press_fcst): static
    {
        $this->coef_bench_press_fcst = $coef_bench_press_fcst;

        return $this;
    }

    public function getCoefDeadlift(): ?string
    {
        return $this->coef_deadlift;
    }

    public function setCoefDeadlift(string $coef_deadlift): static
    {
        $this->coef_deadlift = $coef_deadlift;

        return $this;
    }

    public function getCoefDeadliftFcst(): ?string
    {
        return $this->coef_deadlift_fcst;
    }

    public function setCoefDeadliftFcst(string $coef_deadlift_fcst): static
    {
        $this->coef_deadlift_fcst = $coef_deadlift_fcst;

        return $this;
    }

    public function getCoefTotal(): ?string
    {
        return $this->coef_total;
    }

    public function setCoefTotal(string $coef_total): static
    {
        $this->coef_total = $coef_total;

        return $this;
    }

    public function getCoefTotalFcst(): ?string
    {
        return $this->coef_total_fcst;
    }

    public function setCoefTotalFcst(string $coef_total_fcst): static
    {
        $this->coef_total_fcst = $coef_total_fcst;

        return $this;
    }

    public function getSquatRnk(): ?int
    {
        return $this->squat_rnk;
    }

    public function setSquatRnk(?int $squat_rnk): static
    {
        $this->squat_rnk = $squat_rnk;

        return $this;
    }

    public function getSquatRnkFcst(): ?int
    {
        return $this->squat_rnk_fcst;
    }

    public function setSquatRnkFcst(?int $squat_rnk_fcst): static
    {
        $this->squat_rnk_fcst = $squat_rnk_fcst;

        return $this;
    }

    public function getBenchPressRnk(): ?int
    {
        return $this->bench_press_rnk;
    }

    public function setBenchPressRnk(?int $bench_press_rnk): static
    {
        $this->bench_press_rnk = $bench_press_rnk;

        return $this;
    }

    public function getBenchPressRnkFcst(): ?int
    {
        return $this->bench_press_rnk_fcst;
    }

    public function setBenchPressRnkFcst(?int $bench_press_rnk_fcst): static
    {
        $this->bench_press_rnk_fcst = $bench_press_rnk_fcst;

        return $this;
    }

    public function getDeadliftRnk(): ?int
    {
        return $this->deadlift_rnk;
    }

    public function setDeadliftRnk(?int $deadlift_rnk): static
    {
        $this->deadlift_rnk = $deadlift_rnk;

        return $this;
    }

    public function getDeadliftRnkFcst(): ?int
    {
        return $this->deadlift_rnk_fcst;
    }

    public function setDeadliftRnkFcst(?int $deadlift_rnk_fcst): static
    {
        $this->deadlift_rnk_fcst = $deadlift_rnk_fcst;

        return $this;
    }

    public function getRanking(): ?int
    {
        return $this->ranking;
    }

    public function setRanking(?int $ranking): static
    {
        $this->ranking = $ranking;

        return $this;
    }

    public function getRnkFcst(): ?int
    {
        return $this->rnk_fcst;
    }

    public function setRnkFcst(?int $rnk_fcst): static
    {
        $this->rnk_fcst = $rnk_fcst;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(?int $points): static
    {
        $this->points = $points;

        return $this;
    }

    public function getPointsBp(): ?int
    {
        return $this->points_bp;
    }

    public function setPointsBp(?int $points_bp): static
    {
        $this->points_bp = $points_bp;

        return $this;
    }

    public function getCompetition(): ?Competitions
    {
        return $this->competition;
    }

    public function setCompetition(?Competitions $competition): self
    {
        $this->competition = $competition;
        return $this;
    }
}
