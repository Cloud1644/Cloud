<?php

namespace App\Entity;

use App\Repository\BrandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BrandRepository::class)
 */
class Brand
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
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="probrand", orphanRemoval=true)
     */
    private $brandpro;

    public function __construct()
    {
        $this->brandpro = new ArrayCollection();
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

    /**
     * @return Collection<int, Product>
     */
    public function getBrandpro(): Collection
    {
        return $this->brandpro;
    }

    public function addBrandpro(Product $brandpro): self
    {
        if (!$this->brandpro->contains($brandpro)) {
            $this->brandpro[] = $brandpro;
            $brandpro->setProbrand($this);
        }

        return $this;
    }

    public function removeBrandpro(Product $brandpro): self
    {
        if ($this->brandpro->removeElement($brandpro)) {
            // set the owning side to null (unless already changed)
            if ($brandpro->getProbrand() === $this) {
                $brandpro->setProbrand(null);
            }
        }

        return $this;
    }
    
    public function __toString()
    {
     return $this->name;   
    }
}
