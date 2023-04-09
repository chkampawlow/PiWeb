<?php

namespace App\Entity;

use App\Repository\ParticipateGroupeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParticipateGroupeRepository::class)]
class ParticipateGroupe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Iduser = null;

    #[ORM\ManyToOne(targetEntity: Groupe::class)]
    private Collection $Idgroupe;

    public function __construct()
    {
        $this->Idgroupe = new ArrayCollection();
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

    /**
     * @return Collection<int, Groupe>
     */
    public function getIdgroupe(): Collection
    {
        return $this->Idgroupe;
    }

    public function addIdgroupe(Groupe $idgroupe): self
    {
        if (!$this->Idgroupe->contains($idgroupe)) {
            $this->Idgroupe->add($idgroupe);
        }

        return $this;
    }

    public function removeIdgroupe(Groupe $idgroupe): self
    {
        $this->Idgroupe->removeElement($idgroupe);

        return $this;
    }
}
