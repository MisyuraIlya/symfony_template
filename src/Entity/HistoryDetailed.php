<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\HistoryDetailedRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HistoryDetailedRepository::class)]
#[ApiResource]
class HistoryDetailed
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'historyDetaileds')]
    private ?history $history = null;

    #[ORM\ManyToOne(cascade: ['persist', 'remove'])]
    private ?product $product = null;

    #[ORM\Column(nullable: true)]
    private ?int $singlePrice = null;

    #[ORM\Column(nullable: true)]
    private ?int $quantity = null;

    #[ORM\Column(nullable: true)]
    private ?int $discount = null;

    #[ORM\Column(nullable: true)]
    private ?int $total = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHistory(): ?history
    {
        return $this->history;
    }

    public function setHistory(?history $history): static
    {
        $this->history = $history;

        return $this;
    }

    public function getProduct(): ?product
    {
        return $this->product;
    }

    public function setProduct(?product $product): static
    {
        $this->product = $product;

        return $this;
    }

    public function getSinglePrice(): ?int
    {
        return $this->singlePrice;
    }

    public function setSinglePrice(?int $singlePrice): static
    {
        $this->singlePrice = $singlePrice;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getDiscount(): ?int
    {
        return $this->discount;
    }

    public function setDiscount(?int $discount): static
    {
        $this->discount = $discount;

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(?int $total): static
    {
        $this->total = $total;

        return $this;
    }
}
