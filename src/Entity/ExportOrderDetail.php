<?php

namespace App\Entity;

use App\Repository\ExportOrderDetailRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExportOrderDetailRepository::class)
 */
class ExportOrderDetail
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
    private $ExQuantity;

    /**
     * @ORM\ManyToOne(targetEntity=ExportOrder::class, inversedBy="exdetail")
     * @ORM\JoinColumn(nullable=false)
     */
    private $exorder;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="proDetailExport")
     * @ORM\JoinColumn(nullable=false)
     */
    private $expro;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExQuantity(): ?int
    {
        return $this->ExQuantity;
    }

    public function setExQuantity(int $ExQuantity): self
    {
        $this->ExQuantity = $ExQuantity;

        return $this;
    }

    public function getExorder(): ?ExportOrder
    {
        return $this->exorder;
    }

    public function setExorder(?ExportOrder $exorder): self
    {
        $this->exorder = $exorder;

        return $this;
    }

    public function getExpro(): ?Product
    {
        return $this->expro;
    }

    public function setExpro(?Product $expro): self
    {
        $this->expro = $expro;

        return $this;
    }
}
