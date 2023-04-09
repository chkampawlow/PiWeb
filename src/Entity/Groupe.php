<?php

namespace App\Entity;

use App\Repository\GroupeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GroupeRepository::class)]
class Groupe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Namegroupe = null;

    #[ORM\Column(length: 1000)]
    private ?string $Desgroupe = null;

    #[ORM\Column(length: 10)]
    private ?string $Typegroupe = null;

    #[ORM\Column(nullable: true)]
    private ?int $Membremax = null;

    #[ORM\Column(nullable: true)]
    private ?int $Iduser = null;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function __toString() {
        return $this->id;
    }

    public function getNamegroupe(): ?string
    {
        return $this->Namegroupe;
    }

    public function setNamegroupe(string $Namegroupe): self
    {
        $this->Namegroupe = $Namegroupe;

        return $this;
    }

    public function getDesgroupe(): ?string
    {
        return $this->Desgroupe;
    }

    public function setDesgroupe(string $Desgroupe): self
    {
        $this->Desgroupe = $Desgroupe;

        return $this;
    }

    public function getTypegroupe(): ?string
    {
        return $this->Typegroupe;
    }

    public function setTypegroupe(string $Typegroupe): self
    {
        $this->Typegroupe = $Typegroupe;

        return $this;
    }

    public function getMembremax(): ?int
    {
        return $this->Membremax;
    }

    public function setMembremax(?int $Membremax): self
    {
        $this->Membremax = $Membremax;

        return $this;
    }

    public function getIduser(): ?int
    {
        return $this->Iduser;
    }

    public function setIduser(?int $Iduser): self
    {
        $this->Iduser = $Iduser;

        return $this;
    }
}
