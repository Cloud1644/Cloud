<?php

namespace App\Entity;

use App\Repository\ExportOrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExportOrderRepository::class)
 */
class ExportOrder
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $time;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="UserEx")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ExUser;

    /**
     * @ORM\OneToMany(targetEntity=ExportOrderDetail::class, mappedBy="exorder", orphanRemoval=true)
     */
    private $exdetail;

    public function __construct()
    {
        $this->exdetail = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(\DateTimeInterface $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getExUser(): ?User
    {
        return $this->ExUser;
    }

    public function setExUser(?User $ExUser): self
    {
        $this->ExUser = $ExUser;

        return $this;
    }

    /**
     * @return Collection<int, ExportOrderDetail>
     */
    public function getExdetail(): Collection
    {
        return $this->exdetail;
    }

    public function addExdetail(ExportOrderDetail $exdetail): self
    {
        if (!$this->exdetail->contains($exdetail)) {
            $this->exdetail[] = $exdetail;
            $exdetail->setExorder($this);
        }

        return $this;
    }

    public function removeExdetail(ExportOrderDetail $exdetail): self
    {
        if ($this->exdetail->removeElement($exdetail)) {
            // set the owning side to null (unless already changed)
            if ($exdetail->getExorder() === $this) {
                $exdetail->setExorder(null);
            }
        }

        return $this;
    }
}
