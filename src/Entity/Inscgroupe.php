<?php

namespace App\Entity;

use App\Repository\InscgroupeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscgroupeRepository::class)]
class Inscgroupe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Iduser = null;

    #[ORM\ManyToOne]
    private ?Groupe $grp = null;

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

    public function getGrp(): ?groupe
    {
        return $this->grp;
    }

    public function setGrp(?groupe $grp): self
    {
        $this->grp = $grp;

        return $this;
    }
}
