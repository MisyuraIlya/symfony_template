<?php

namespace App\Entity;

use App\Repository\PackProductsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PackProductsRepository::class)]
class PackProducts
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'packProducts')]
    private ?PackMain $pack = null;

    #[ORM\ManyToOne(inversedBy: 'packProducts')]
    private ?Product $product = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPack(): ?PackMain
    {
        return $this->pack;
    }

    public function setPack(?PackMain $pack): static
    {
        $this->pack = $pack;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): static
    {
        $this->product = $product;

        return $this;
    }
}
