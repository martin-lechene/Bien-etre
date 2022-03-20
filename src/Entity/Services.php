<?php

namespace App\Entity;

use App\Repository\ServicesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServicesRepository::class)
 */
class Services
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descript;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_visible_homepage;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_valid;
    
    /**
     * @ORM\ManyToMany(targetEntity=Images::class, mappedBy="ServicesID")
     */
    private $images;

    /**
     * @ORM\ManyToMany(targetEntity=Promotion::class, mappedBy="servicesID")
     */
    private $promotions;

    /**
     * @ORM\ManyToMany(targetEntity=Propose::class, mappedBy="servicesID")
     */
    private $proposes;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $img;

  
    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->promotions = new ArrayCollection();
        $this->proposes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescript(): ?string
    {
        return $this->descript;
    }

    public function setDescript(string $descript): self
    {
        $this->descript = $descript;

        return $this;
    }

    public function getIsVisibleHomepage(): ?bool
    {
        return $this->is_visible_homepage;
    }

    public function setIsVisibleHomepage(bool $is_visible_homepage): self
    {
        $this->is_visible_homepage = $is_visible_homepage;

        return $this;
    }

    public function getIsValid(): ?bool
    {
        return $this->is_valid;
    }

    public function setIsValid(bool $is_valid): self
    {
        $this->is_valid = $is_valid;

        return $this;
    }

    /**
     * @return Collection|Images[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Images $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->addServicesID($this);
        }

        return $this;
    }

    public function removeImage(Images $image): self
    {
        if ($this->images->removeElement($image)) {
            $image->removeServicesID($this);
        }

        return $this;
    }

    /**
     * @return Collection|Promotion[]
     */
    public function getPromotions(): Collection
    {
        return $this->promotions;
    }

    public function addPromotion(Promotion $promotion): self
    {
        if (!$this->promotions->contains($promotion)) {
            $this->promotions[] = $promotion;
            $promotion->addServicesID($this);
        }

        return $this;
    }

    public function removePromotion(Promotion $promotion): self
    {
        if ($this->promotions->removeElement($promotion)) {
            $promotion->removeServicesID($this);
        }

        return $this;
    }

    /**
     * @return Collection|Propose[]
     */
    public function getProposes(): Collection
    {
        return $this->proposes;
    }

    public function addPropose(Propose $propose): self
    {
        if (!$this->proposes->contains($propose)) {
            $this->proposes[] = $propose;
            $propose->addServicesID($this);
        }

        return $this;
    }

    public function removePropose(Propose $propose): self
    {
        if ($this->proposes->removeElement($propose)) {
            $propose->removeServicesID($this);
        }

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): self
    {
        $this->img = $img;

        return $this;
    }

    
}
