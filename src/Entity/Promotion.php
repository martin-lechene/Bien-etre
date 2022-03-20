<?php

namespace App\Entity;

use App\Repository\PromotionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PromotionRepository::class)
 */
class Promotion
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     */
    private $DocumentPDF;

    /**
     * @ORM\Column(type="date")
     */
    private $date_start;

    /**
     * @ORM\Column(type="date")
     */
    private $date_end;

    /**
     * @ORM\Column(type="date")
     */
    private $date_start_view;

    /**
     * @ORM\Column(type="date")
     */
    private $date_end_view;

    /**
     * @ORM\ManyToOne(targetEntity=Prestataires::class, inversedBy="promotions")
     */
    private $PrestataireID;

    /**
     * @ORM\ManyToMany(targetEntity=ServiceCategory::class, inversedBy="promotions")
     */
    private $serviceCategoryID;

    public function __construct()
    {
        $this->serviceCategoryID = new ArrayCollection();
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

    public function getDocumentPDF(): ?string
    {
        return $this->DocumentPDF;
    }

    public function setDocumentPDF(string $DocumentPDF): self
    {
        $this->DocumentPDF = $DocumentPDF;

        return $this;
    }

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->date_start;
    }

    public function setDateStart(\DateTimeInterface $date_start): self
    {
        $this->date_start = $date_start;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->date_end;
    }

    public function setDateEnd(\DateTimeInterface $date_end): self
    {
        $this->date_end = $date_end;

        return $this;
    }

    public function getDateStartView(): ?\DateTimeInterface
    {
        return $this->date_start_view;
    }

    public function setDateStartView(\DateTimeInterface $date_start_view): self
    {
        $this->date_start_view = $date_start_view;

        return $this;
    }

    public function getDateEndView(): ?\DateTimeInterface
    {
        return $this->date_end_view;
    }

    public function setDateEndView(\DateTimeInterface $date_end_view): self
    {
        $this->date_end_view = $date_end_view;

        return $this;
    }

    public function getPrestataireID(): ?Prestataires
    {
        return $this->PrestataireID;
    }

    public function setPrestataireID(?Prestataires $PrestataireID): self
    {
        $this->PrestataireID = $PrestataireID;

        return $this;
    }

    /**
     * @return Collection|ServiceCategory[]
     */
    public function getServiceCategoryID(): Collection
    {
        return $this->serviceCategoryID;
    }

    public function addServiceCategoryID(ServiceCategory $serviceCategoryID): self
    {
        if (!$this->serviceCategoryID->contains($serviceCategoryID)) {
            $this->serviceCategoryID[] = $serviceCategoryID;
        }

        return $this;
    }

    public function removeServiceCategoryID(ServiceCategory $serviceCategoryID): self
    {
        $this->serviceCategoryID->removeElement($serviceCategoryID);

        return $this;
    }
}
