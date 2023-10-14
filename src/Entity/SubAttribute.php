<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SubAttributeRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Product;
use App\Entity\AttributeMain;

use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Metadata\Link;

#[ORM\Entity(repositoryClass: SubAttributeRepository::class)]
#[ApiResource]
#[ApiResource(
    normalizationContext: ['groups' => ['SubAttribute:read']],
    denormalizationContext: ['groups' => ['SubAttribute:write']],
)]
class SubAttribute
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['product:read','SubAttribute:read', 'attribute:read'])]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'SubAttributes')]
    private ?Product $product = null;

    #[Groups(['product:read','SubAttribute:read', 'attribute:read'])]
    #[ORM\ManyToOne(inversedBy: 'SubAttributes')]
    private ?AttributeMain $attribute = null;

    #[Groups(['product:read','SubAttribute:read', 'attribute:read'])]
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $title = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAttribute(): ?AttributeMain
    {
        return $this->attribute;
    }

    public function setAttribute(?AttributeMain $attribute): static
    {
        $this->attribute = $attribute;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }
}
