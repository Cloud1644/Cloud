<?php

namespace App\Entity;

use App\Repository\ImportOrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImportOrderRepository::class)
 */
class ImportOrder
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $time;

    /**
     * @ORM\OneToMany(targetEntity=ImportOrderDetail::class, mappedBy="imorder", orphanRemoval=true)
     */
    private $imdetail;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="UserIm")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ImUser;

    public function __construct()
    {
        $this->imdetail = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(\DateTimeInterface $time ): self
    {
        $this->time = $time;

        return $this;
    }

    /**
     * @return Collection<int, ImportOrderDetail>
     */
    public function getImdetail(): Collection
    {
        return $this->imdetail;
    }

    public function addImdetail(ImportOrderDetail $imdetail): self
    {
        if (!$this->imdetail->contains($imdetail)) {
            $this->imdetail[] = $imdetail;
            $imdetail->setImorder($this);
        }

        return $this;
    }

    public function removeImdetail(ImportOrderDetail $imdetail): self
    {
        if ($this->imdetail->removeElement($imdetail)) {
            // set the owning side to null (unless already changed)
            if ($imdetail->getImorder() === $this) {
                $imdetail->setImorder(null);
            }
        }

        return $this;
    }

    public function getImUser(): ?User
    {
        return $this->ImUser;
    }

    public function setImUser(?User $ImUser): self
    {
        $this->ImUser = $ImUser;

        return $this;
    }
    
}
