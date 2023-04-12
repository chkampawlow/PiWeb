<?php

namespace App\Entity;

use App\Repository\CampingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CampingRepository::class)]
class Camping
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Namecamp = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $Descamp = null;

    #[ORM\Column(length: 255)]
    private ?string $Placecamp = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Datecamp = null;

    #[ORM\Column(nullable: true)]
    private ?int $Ndaycamp = null;

    #[ORM\ManyToOne]
    private ?Groupe $Idgroupe = null;

    public function __toString(){
        return $this->Namecamp; // Remplacer champ par une propriété "string" de l'entité
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNamecamp(): ?string
    {
        return $this->Namecamp;
    }

    public function setNamecamp(string $Namecamp): self
    {
        $this->Namecamp = $Namecamp;

        return $this;
    }

    public function getDescamp(): ?string
    {
        return $this->Descamp;
    }

    public function setDescamp(?string $Descamp): self
    {
        $this->Descamp = $Descamp;

        return $this;
    }

    public function getPlacecamp(): ?string
    {
        return $this->Placecamp;
    }

    public function setPlacecamp(string $Placecamp): self
    {
        $this->Placecamp = $Placecamp;

        return $this;
    }

    public function getDatecamp(): ?\DateTimeInterface
    {
        return $this->Datecamp;
    }

    public function setDatecamp(\DateTimeInterface $Datecamp): self
    {
        $this->Datecamp = $Datecamp;

        return $this;
    }

    public function getNdaycamp(): ?int
    {
        return $this->Ndaycamp;
    }

    public function setNdaycamp(?int $Ndaycamp): self
    {
        $this->Ndaycamp = $Ndaycamp;

        return $this;
    }

    public function getIdgroupe(): ?Groupe
    {
        return $this->Idgroupe;
    }

    public function setIdgroupe(?Groupe $Idgroupe): self
    {
        $this->Idgroupe = $Idgroupe;

        return $this;
    }

}
