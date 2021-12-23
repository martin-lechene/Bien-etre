<?php

namespace App\Entity;

use App\Repository\PrestatairesRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrestatairesRepository::class)
 */
class Prestataires
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=125)
     */
    private $website;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $number_phone;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $number_tva;

    /**
     * @ORM\Column(type="string")
     */
    private $url_logo;

    /**
     * @ORM\Column(type="text")
     */
    private $desc_short;

    /**
     * @ORM\Column(type="text")
     */
    private $desc_long;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_create;

    /**
     * @ORM\ManyToMany(targetEntity=categories::class, inversedBy="prestataires")
     */
    private $categories;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
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

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getnumber_phone(): ?string
    {
        return $this->number_phone;
    }

    public function setnumber_phone(string $number_phone): self
    {
        $this->number_phone = $number_phone;

        return $this;
    }

    public function getnumber_tva(): ?string
    {
        return $this->number_tva;
    }

    public function setnumber_tva(string $number_tva): self
    {
        $this->number_tva = $number_tva;

        return $this;
    }

    public function getUrlLogo()
    {
        return $this->url_logo;
    }

    public function setUrlLogo($url_logo): self
    {
        $this->url_logo = $url_logo;

        return $this;
    }

    public function getDescShort(): ?string
    {
        return $this->desc_short;
    }

    public function setDescShort(string $desc_short): self
    {
        $this->desc_short = $desc_short;

        return $this;
    }

    public function getDescLong(): ?string
    {
        return $this->desc_long;
    }

    public function setDescLong(string $desc_long): self
    {
        $this->desc_long = $desc_long;

        return $this;
    }

public function getDateCreate(): ?\DateTimeInterface
    {
        return $this->date_create;
    }

    public function setDateCreate(\DateTimeInterface $date_create): self
    {
        $this->date_create = DateTime();

        return $this;
    }

    /**
     * @return Collection|categories[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(categories $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(categories $category): self
    {
        $this->categories->removeElement($category);

        return $this;
    }
}
