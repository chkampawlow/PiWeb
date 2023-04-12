<?php

namespace App\Entity;

use App\Repository\PartcampingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartcampingRepository::class)]
class Partcamping
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Iduser = null;

    #[ORM\ManyToOne]
    private ?Camping $camp = null;

    public function __toString(){
        return $this-$camp;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIduser(): ?int
    {
        return $this->Iduser;
    }

    public function setIduser(int $Iduser): self
    {
        $this->Iduser = $Iduser;

        return $this;
    }

    public function getCamp(): ?Camping
    {
        return $this->camp;
    }

    public function setCamp(?Camping $camp): self
    {
        $this->camp = $camp;

        return $this;
    }
}
