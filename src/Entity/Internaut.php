<?php

namespace App\Entity;

use App\Repository\InternautRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InternautRepository::class)
 */
class Internaut
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $frist_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $last_name;

    /**
     * @ORM\Column(type="smallint")
     */
    private $newsletter;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="InternautID")
     */
    private $users;

  
    /**
     * @ORM\ManyToMany(targetEntity=Favori::class, mappedBy="internautID")
     */
    private $favoris;

    /**
     * @ORM\ManyToMany(targetEntity=Images::class, mappedBy="InternautID")
     */
    private $images;

    /**
     * @ORM\ManyToMany(targetEntity=Position::class, mappedBy="internautID")
     */
    private $positions;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->favoris = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->positions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFristName(): ?string
    {
        return $this->frist_name;
    }

    public function setFristName(string $frist_name): self
    {
        $this->frist_name = $frist_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getNewsletter(): ?int
    {
        return $this->newsletter;
    }

    public function setNewsletter(int $newsletter): self
    {
        $this->newsletter = $newsletter;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addInternautID($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeInternautID($this);
        }

        return $this;
    }

  
    /**
     * @return Collection|Favori[]
     */
    public function getFavoris(): Collection
    {
        return $this->favoris;
    }

    public function addFavori(Favori $favori): self
    {
        if (!$this->favoris->contains($favori)) {
            $this->favoris[] = $favori;
            $favori->addInternautID($this);
        }

        return $this;
    }

    public function removeFavori(Favori $favori): self
    {
        if ($this->favoris->removeElement($favori)) {
            $favori->removeInternautID($this);
        }

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
            $image->addInternautID($this);
        }

        return $this;
    }

    public function removeImage(Images $image): self
    {
        if ($this->images->removeElement($image)) {
            $image->removeInternautID($this);
        }

        return $this;
    }

    /**
     * @return Collection|Position[]
     */
    public function getPositions(): Collection
    {
        return $this->positions;
    }

    public function addPosition(Position $position): self
    {
        if (!$this->positions->contains($position)) {
            $this->positions[] = $position;
            $position->addInternautID($this);
        }

        return $this;
    }

    public function removePosition(Position $position): self
    {
        if ($this->positions->removeElement($position)) {
            $position->removeInternautID($this);
        }

        return $this;
    }
}
