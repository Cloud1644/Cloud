<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
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
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\Column(type="date")
     */
    private $created;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="catpro")
     * @ORM\JoinColumn(nullable=false)
     */
    private $procat;

    /**
     * @ORM\ManyToOne(targetEntity=Brand::class, inversedBy="brandpro")
     * @ORM\JoinColumn(nullable=false)
     */
    private $probrand;

    /**
     * @ORM\Column(type="float")
     */
    private $priceImport;

    /**
     * @ORM\Column(type="float")
     */
    private $priceExport;

    /**
     * @ORM\OneToMany(targetEntity=ImportOrderDetail::class, mappedBy="impro", orphanRemoval=true)
     */
    private $proDetailImport;

    /**
     * @ORM\OneToMany(targetEntity=ExportOrderDetail::class, mappedBy="expro", orphanRemoval=true)
     */
    private $proDetailExport;

    public function __construct()
    {
        $this->proDetailImport = new ArrayCollection();
        $this->proDetailExport = new ArrayCollection();
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

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getProcat(): ?Category
    {
        return $this->procat;
    }

    public function setProcat(?Category $procat): self
    {
        $this->procat = $procat;

        return $this;
    }

    public function getProbrand(): ?Brand
    {
        return $this->probrand;
    }

    public function setProbrand(?Brand $probrand): self
    {
        $this->probrand = $probrand;

        return $this;
    }

    public function getPriceImport(): ?float
    {
        return $this->priceImport;
    }

    public function setPriceImport(float $priceImport): self
    {
        $this->priceImport = $priceImport;

        return $this;
    }

    public function getPriceExport(): ?float
    {
        return $this->priceExport;
    }

    public function setPriceExport(float $priceExport): self
    {
        $this->priceExport = $priceExport;

        return $this;
    }

    /**
     * @return Collection<int, ImportOrderDetail>
     */
    public function getProDetailImport(): Collection
    {
        return $this->proDetailImport;
    }

    public function addProDetailImport(ImportOrderDetail $proDetailImport): self
    {
        if (!$this->proDetailImport->contains($proDetailImport)) {
            $this->proDetailImport[] = $proDetailImport;
            $proDetailImport->setImpro($this);
        }

        return $this;
    }

    public function removeProDetailImport(ImportOrderDetail $proDetailImport): self
    {
        if ($this->proDetailImport->removeElement($proDetailImport)) {
            // set the owning side to null (unless already changed)
            if ($proDetailImport->getImpro() === $this) {
                $proDetailImport->setImpro(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ExportOrderDetail>
     */
    public function getProDetailExport(): Collection
    {
        return $this->proDetailExport;
    }

    public function addProDetailExport(ExportOrderDetail $proDetailExport): self
    {
        if (!$this->proDetailExport->contains($proDetailExport)) {
            $this->proDetailExport[] = $proDetailExport;
            $proDetailExport->setExpro($this);
        }

        return $this;
    }

    public function removeProDetailExport(ExportOrderDetail $proDetailExport): self
    {
        if ($this->proDetailExport->removeElement($proDetailExport)) {
            // set the owning side to null (unless already changed)
            if ($proDetailExport->getExpro() === $this) {
                $proDetailExport->setExpro(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
