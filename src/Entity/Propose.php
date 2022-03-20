<?php

namespace App\Entity;

use App\Repository\ProposeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProposeRepository::class)
 */
class Propose
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=serviceCategory::class, inversedBy="proposes")
     */
    private $servicesCategoryID;

    /**
     * @ORM\ManyToMany(targetEntity=Prestataires::class, inversedBy="proposes")
     */
    private $prestaireID;

    public function __construct()
    {
        $this->servicesCategoryID = new ArrayCollection();
        $this->prestaireID = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|serviceCategory[]
     */
    public function getServicesCategoryID(): Collection
    {
        return $this->servicesCategoryID;
    }

    public function addServicesCategoryID(serviceCategory $servicesCategoryID): self
    {
        if (!$this->servicesCategoryID->contains($servicesCategoryID)) {
            $this->servicesCategoryID[] = $servicesCategoryID;
        }

        return $this;
    }

    public function removeServicesCategoryID(serviceCategory $servicesCategoryID): self
    {
        $this->servicesCategoryID->removeElement($servicesCategoryID);

        return $this;
    }

    /**
     * @return Collection|Prestataires[]
     */
    public function getPrestaireID(): Collection
    {
        return $this->prestaireID;
    }

    public function addPrestaireID(Prestataires $prestaireID): self
    {
        if (!$this->prestaireID->contains($prestaireID)) {
            $this->prestaireID[] = $prestaireID;
        }

        return $this;
    }

    public function removePrestaireID(Prestataires $prestaireID): self
    {
        $this->prestaireID->removeElement($prestaireID);

        return $this;
    }
}
