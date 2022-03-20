<?php

namespace App\Entity;

use App\Repository\PrestatairesCategorysRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrestatairesCategorysRepository::class)
 */
class PrestatairesCategorys
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Categorys::class, inversedBy="PrestatairesCategorys")
     */
    private $categorys_id;

    /**
     * @ORM\ManyToMany(targetEntity=Prestataires::class, inversedBy="PrestatairesCategorys")
     */
    private $prestataires_id;

    public function __construct()
    {
        $this->categorys_id = new ArrayCollection();
        $this->prestataires_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Categorys[]
     */
    public function getCategorysId(): Collection
    {
        return $this->categorys_id;
    }

    public function addCategorysId(Categorys $categorysId): self
    {
        if (!$this->categorys_id->contains($categorysId)) {
            $this->categorys_id[] = $categorysId;
        }

        return $this;
    }

    public function removeCategorysId(Categorys $categorysId): self
    {
        $this->categorys_id->removeElement($categorysId);

        return $this;
    }

    /**
     * @return Collection|Prestataires[]
     */
    public function getPrestatairesId(): Collection
    {
        return $this->prestataires_id;
    }

    public function addPrestatairesId(Prestataires $prestatairesId): self
    {
        if (!$this->prestataires_id->contains($prestatairesId)) {
            $this->prestataires_id[] = $prestatairesId;
        }

        return $this;
    }

    public function removePrestatairesId(Prestataires $prestatairesId): self
    {
        $this->prestataires_id->removeElement($prestatairesId);

        return $this;
    }
}
