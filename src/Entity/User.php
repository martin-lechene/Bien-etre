<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
    */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $adresseNum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $inscription;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $typeUtilisateur;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbEssaisInfructueux = 0;

    /**
     * @ORM\Column(type="boolean")
     */
    private $banni = 0;

    /**
     * @ORM\Column(type="boolean")
     */
    private $inscriptConfirm = 0;

   

   
   
    /**
     * @ORM\Column(type="boolean")
     */
    private $isVerified = false;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $img;


    /**
     * @ORM\OneToMany(targetEntity=Services::class, mappedBy="user")
     */
    private $services;

    /**
     * @ORM\OneToMany(targetEntity=Categorys::class, mappedBy="user")
     */
    private $categorys;

    /**
     * @ORM\OneToMany(targetEntity=Prestataires::class, mappedBy="User")
     */
    private $prestataires;

    public function __construct()
    {
        // your own logic
        $this->roles = array('ROLE_USER');
        $this->services = new ArrayCollection();
        $this->categorys = new ArrayCollection();
        $this->prestataires = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
    

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    public function getRoles(): array
    {
            $roles = $this->roles;
            // guarantee every user at least has ROLE_USER
            $roles[] = 'ROLE_USER';

            return array_unique($roles);
    }
    public function setRoles(array $roles): self
    {
            $this->roles = $roles;

            return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getInscription(): ?\DateTimeInterface
    {
        return $this->inscription;
    }

    public function setInscription(?\DateTimeInterface $inscription): self
    {
        $this->inscription = $inscription;

        return $this;
    }

    public function getTypeUtilisateur(): ?string
    {
        return $this->typeUtilisateur;
    }

    public function setTypeUtilisateur(?string $typeUtilisateur): self
    {
        $this->typeUtilisateur = $typeUtilisateur;

        return $this;
    }

    public function getNbEssaisInfructueux(): ?int
    {
        return $this->nbEssaisInfructueux;
    }

    public function setNbEssaisInfructueux(?int $nbEssaisInfructueux): self
    {
        $this->nbEssaisInfructueux = $nbEssaisInfructueux;

        return $this;
    }

    public function getBanni(): ?bool
    {
        return $this->banni;
    }

    public function setBanni(bool $banni): self
    {
        $this->banni = $banni;

        return $this;
    }

    public function getInscriptConfirm(): ?bool
    {
        return $this->inscriptConfirm;
    }

    public function setInscriptConfirm(bool $inscriptConfirm): self
    {
        $this->inscriptConfirm = $inscriptConfirm;

        return $this;
    }

   
    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;
        return $this;
    }

    public function getIsVerified(): ?bool
    {
        return $this->isVerified;
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

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): self
    {
        $this->img = $img;
    }


    /**
     * @return Collection<int, Services>
     */
    public function getServices(): Collection
    {
        return $this->services;
    }

    public function addService(Services $service): self
    {
        if (!$this->services->contains($service)) {
            $this->services[] = $service;
            $service->setUser($this);
        }

        return $this;
    }

    public function removeService(Services $service): self
    {
        if ($this->services->removeElement($service)) {
            // set the owning side to null (unless already changed)
            if ($service->getUser() === $this) {
                $service->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Prestataires>
     */
    public function getPrestataires(): Collection
    {
        return $this->prestataires;
    }

    public function addPrestataire(Prestataires $prestataire): self
    {
        if (!$this->prestataires->contains($prestataire)) {
            $this->prestataires[] = $prestataire;
            $prestataire->setUser($this);
        }

        return $this;
    }

    public function removePrestataire(Prestataires $prestataire): self
    {
        if ($this->prestataires->removeElement($prestataire)) {
            // set the owning side to null (unless already changed)
            if ($prestataire->getUser() === $this) {
                $prestataire->setUser(null);
            }
        }

        return $this;
    }
}
