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
     * @ORM\ManyToMany(targetEntity=Categorys::class, inversedBy="prestataires")
     */
    private $categorys;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_public;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categoryService;

    /**
     * @ORM\Column(type="integer")
     */
    private $numStreet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameCity;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameSteet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Country;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numPostal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $services;

    /**
     * @ORM\Column(type="integer")
     */
    private $num_like;

    /**
     * @ORM\Column(type="integer")
     */
    private $num_comment;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="prestataires")
     */
    private $User;

    public function __construct()
    {
        $this->categorys = new ArrayCollection();
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

    public function getUrlLogo(): ?string
    {
        return $this->url_logo;
    }

    public function setUrlLogo(string $url_logo): self
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
        $this->date_create = $date_create;

        return $this;
    }

    /**
     * @return Collection|Categorys[]
     */
    public function getCategorys(): Collection
    {
        return $this->categorys;
    }

    public function addCategory(Categorys $category): self
    {
        if (!$this->categorys->contains($category)) {
            $this->categorys[] = $category;
        }

        return $this;
    }

    public function removeCategory(Categorys $category): self
    {
        $this->categorys->removeElement($category);

        return $this;
    }

    public function getNumberPhone(): ?string
    {
        return $this->number_phone;
    }

    public function setNumberPhone(?string $number_phone): self
    {
        $this->number_phone = $number_phone;

        return $this;
    }

    public function getNumberTva(): ?string
    {
        return $this->number_tva;
    }

    public function setNumberTva(?string $number_tva): self
    {
        $this->number_tva = $number_tva;

        return $this;
    }

    public function getIsPublic(): ?bool
    {
        return $this->is_public;
    }

    public function setIsPublic(bool $is_public): self
    {
        $this->is_public = $is_public;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCategoryService(): ?string
    {
        return $this->categoryService;
    }

    public function setCategoryService(string $categoryService): self
    {
        $this->categoryService = $categoryService;

        return $this;
    }

    public function getNumStreet(): ?int
    {
        return $this->numStreet;
    }

    public function setNumStreet(int $numStreet): self
    {
        $this->numStreet = $numStreet;

        return $this;
    }

    public function getNameCity(): ?string
    {
        return $this->nameCity;
    }

    public function setNameCity(string $nameCity): self
    {
        $this->nameCity = $nameCity;

        return $this;
    }

    public function getNameSteet(): ?string
    {
        return $this->nameSteet;
    }

    public function setNameSteet(string $nameSteet): self
    {
        $this->nameSteet = $nameSteet;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->Country;
    }

    public function setCountry(string $Country): self
    {
        $this->Country = $Country;

        return $this;
    }

    public function getNumPostal(): ?string
    {
        return $this->numPostal;
    }

    public function setNumPostal(string $numPostal): self
    {
        $this->numPostal = $numPostal;

        return $this;
    }

    public function getServices(): ?string
    {
        return $this->services;
    }

    public function setServices(string $services): self
    {
        $this->services = $services;

        return $this;
    }

    public function getNumLike(): ?int
    {
        return $this->num_like;
    }

    public function setNumLike(int $num_like): self
    {
        $this->num_like = $num_like;

        return $this;
    }

    public function getNumComment(): ?int
    {
        return $this->num_comment;
    }

    public function setNumComment(int $num_comment): self
    {
        $this->num_comment = $num_comment;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }
}
