<?php

namespace App\Entity;

use App\Repository\FavoriRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FavoriRepository::class)
 */
class Favori
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Prestataires::class, inversedBy="favoris")
     */
    private $prestataireID;

    /**
     * @ORM\ManyToMany(targetEntity=Internaut::class, inversedBy="favoris")
     */
    private $internautID;

    public function __construct()
    {
        $this->prestataireID = new ArrayCollection();
        $this->internautID = new ArrayCollection();
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
}
