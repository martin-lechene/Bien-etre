<?php

namespace App\Entity;

use App\Repository\CategorysRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorysRepository::class)
 */
class Categorys
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
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url_img;

    /**
     * @ORM\ManyToMany(targetEntity=Prestataires::class, mappedBy="categorys")
     */
    private $prestataires;

    /**
     * @ORM\ManyToMany(targetEntity=PrestatairesCategorys::class, mappedBy="categorys_id")
     */
    private $prestatairesCategorys;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="categorys")
     */
    private $user;


    public function __construct()
    {
        $this->prestataires = new ArrayCollection();
        $this->prestatairesCategorys = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUrl_img(): ?string
    {
        return $this->url_img;
    }

    public function setUrl_img(string $url_img): self
    {
        $this->url_img = $url_img;

        return $this;
    }

    /**
     * @return Collection|Prestataires[]
     */
    public function getPrestataires(): Collection
    {
        return $this->prestataires;
    }

    public function addPrestataire(Prestataires $prestataire): self
    {
        if (!$this->prestataires->contains($prestataire)) {
            $this->prestataires[] = $prestataire;
            $prestataire->addCategory($this);
        }

        return $this;
    }

    public function removePrestataire(Prestataires $prestataire): self
    {
        if ($this->prestataires->removeElement($prestataire)) {
            $prestataire->removeCategory($this);
        }

        return $this;
    }

    /**
     * @return Collection|PrestatairesCategorys[]
     */
    public function getPrestatairesCategorys(): Collection
    {
        return $this->prestatairesCategorys;
    }

    public function addPrestatairesCategory(PrestatairesCategorys $prestatairesCategory): self
    {
        if (!$this->prestatairesCategorys->contains($prestatairesCategory)) {
            $this->prestatairesCategorys[] = $prestatairesCategory;
            $prestatairesCategory->addCategorysId($this);
        }

        return $this;
    }

    public function removePrestatairesCategory(PrestatairesCategorys $prestatairesCategory): self
    {
        if ($this->prestatairesCategorys->removeElement($prestatairesCategory)) {
            $prestatairesCategory->removeCategorysId($this);
        }

        return $this;
    }

    public function getUrlImg(): ?string
    {
        return $this->url_img;
    }

    public function setUrlImg(string $url_img): self
    {
        $this->url_img = $url_img;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

   
}
