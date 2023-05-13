<?php

namespace App\Entity;

use App\Repository\ImportOrderDetailRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImportOrderDetailRepository::class)
 */
class ImportOrderDetail
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $ImQuantity;

    /**
     * @ORM\ManyToOne(targetEntity=ImportOrder::class, inversedBy="imdetail")
     * @ORM\JoinColumn(nullable=false)
     */
    private $imorder;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="proDetailImport")
     * @ORM\JoinColumn(nullable=false)
     */
    private $impro;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImQuantity(): ?int
    {
        return $this->ImQuantity;
    }

    public function setImQuantity(int $ImQuantity): self
    {
        $this->ImQuantity = $ImQuantity;

        return $this;
    }

    public function getImorder(): ?ImportOrder
    {
        return $this->imorder;
    }

    public function setImorder(?ImportOrder $imorder): self
    {
        $this->imorder = $imorder;

        return $this;
    }

    public function getImpro(): ?Product
    {
        return $this->impro;
    }

    public function setImpro(?Product $impro): self
    {
        $this->impro = $impro;

        return $this;
    }
}
