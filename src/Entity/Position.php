<?php

namespace App\Entity;

use App\Repository\PositionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PositionRepository::class)
 */
class Position
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $number_ASC;

    /**
     * @ORM\ManyToMany(targetEntity=Internaut::class, inversedBy="positions")
     */
    private $internautID;

    /**
     * @ORM\ManyToMany(targetEntity=bloc::class, inversedBy="positions")
     */
    private $BlocID;

    public function __construct()
    {
        $this->internautID = new ArrayCollection();
        $this->BlocID = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberASC(): ?int
    {
        return $this->number_ASC;
    }

    public function setNumberASC(int $number_ASC): self
    {
        $this->number_ASC = $number_ASC;

        return $this;
    }

    /**
     * @return Collection|Internaut[]
     */
    public function getInternautID(): Collection
    {
        return $this->internautID;
    }

    public function addInternautID(Internaut $internautID): self
    {
        if (!$this->internautID->contains($internautID)) {
            $this->internautID[] = $internautID;
        }

        return $this;
    }

    public function removeInternautID(Internaut $internautID): self
    {
        $this->internautID->removeElement($internautID);

        return $this;
    }

    /**
     * @return Collection|bloc[]
     */
    public function getBlocID(): Collection
    {
        return $this->BlocID;
    }

    public function addBlocID(bloc $blocID): self
    {
        if (!$this->BlocID->contains($blocID)) {
            $this->BlocID[] = $blocID;
        }

        return $this;
    }

    public function removeBlocID(bloc $blocID): self
    {
        $this->BlocID->removeElement($blocID);

        return $this;
    }
}
