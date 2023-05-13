<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
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
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="procat", orphanRemoval=true)
     */
    private $catpro;

    public function __construct()
    {
        $this->catpro = new ArrayCollection();
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
    public function getCatpro(): Collection
    {
        return $this->catpro;
    }

    public function addCatpro(Product $catpro): self
    {
        if (!$this->catpro->contains($catpro)) {
            $this->catpro[] = $catpro;
            $catpro->setProcat($this);
        }

        return $this;
    }

    public function removeCatpro(Product $catpro): self
    {
        if ($this->catpro->removeElement($catpro)) {
            // set the owning side to null (unless already changed)
            if ($catpro->getProcat() === $this) {
                $catpro->setProcat(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
     return $this->name;   
    }
}
