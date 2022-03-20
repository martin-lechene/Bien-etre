<?php

namespace App\Entity;

use App\Repository\StageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StageRepository::class)
 */
class Stage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Prestataires::class, inversedBy="stages")
     */
    private $prestataireID;

    public function __construct()
    {
        $this->prestataireID = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Prestataires[]
     */
    public function getPrestataireID(): Collection
    {
        return $this->prestataireID;
    }

    public function addPrestataireID(Prestataires $prestataireID): self
    {
        if (!$this->prestataireID->contains($prestataireID)) {
            $this->prestataireID[] = $prestataireID;
        }

        return $this;
    }

    public function removePrestataireID(Prestataires $prestataireID): self
    {
        $this->prestataireID->removeElement($prestataireID);

        return $this;
    }
}
