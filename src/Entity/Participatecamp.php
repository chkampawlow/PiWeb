<?php

namespace App\Entity;

use App\Repository\ParticipatecampRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParticipatecampRepository::class)]
class Participatecamp
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Iduser = null;

    #[ORM\ManyToOne(targetEntity: Camping::class)]
    private Collection $Idcamp;

    public function __construct()
    {
        $this->Idcamp = new ArrayCollection();
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
     * @return Collection<int, Camping>
     */
    public function getIdcamp(): Collection
    {
        return $this->Idcamp;
    }

    public function addIdcamp(Camping $idcamp): self
    {
        if (!$this->Idcamp->contains($idcamp)) {
            $this->Idcamp->add($idcamp);
        }

        return $this;
    }

    public function removeIdcamp(Camping $idcamp): self
    {
        $this->Idcamp->removeElement($idcamp);

        return $this;
    }
}
