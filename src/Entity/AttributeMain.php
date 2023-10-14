<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\AttributeMainRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Metadata\Link;

#[ORM\Entity(repositoryClass: AttributeMainRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['attribute:read']],
    denormalizationContext: ['groups' => ['attribute:write']],
)]
class AttributeMain
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $extId = null;

    #[Groups(['product:read','category:read','SubAttribute:read','attribute:write'])]
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $title = null;

    #[ORM\Column]
    private ?bool $isPublished = null;

    #[ORM\Column(nullable: true)]
    private ?int $orden = null;

    #[ORM\Column]
    private ?bool $isInProductCard = null;

    #[ORM\Column]
    private ?bool $isInFilter = null;

    #[ORM\OneToMany(mappedBy: 'attribute', targetEntity: SubAttribute::class)]
    private Collection $SubAttributes;

    public function __construct()
    {
        $this->SubAttributes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExtId(): ?string
    {
        return $this->extId;
    }

    public function setExtId(?string $extId): static
    {
        $this->extId = $extId;

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

    public function isIsPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(bool $isPublished): static
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    public function getOrden(): ?int
    {
        return $this->orden;
    }

    public function setOrden(?int $orden): static
    {
        $this->orden = $orden;

        return $this;
    }

    public function isIsInProductCard(): ?bool
    {
        return $this->isInProductCard;
    }

    public function setIsInProductCard(bool $isInProductCard): static
    {
        $this->isInProductCard = $isInProductCard;

        return $this;
    }

    public function isIsInFilter(): ?bool
    {
        return $this->isInFilter;
    }

    public function setIsInFilter(bool $isInFilter): static
    {
        $this->isInFilter = $isInFilter;

        return $this;
    }

    /**
     * @return Collection<int, SubAttribute>
     */
    public function getSubAttributes(): Collection
    {
        return $this->SubAttributes;
    }

    public function addSubAttribute(SubAttribute $SubAttribute): static
    {
        if (!$this->SubAttributes->contains($SubAttribute)) {
            $this->SubAttributes->add($SubAttribute);
            $SubAttribute->setAttributeId($this);
        }

        return $this;
    }

    public function removeSubAttribute(SubAttribute $SubAttribute): static
    {
        if ($this->SubAttributes->removeElement($SubAttribute)) {
            // set the owning side to null (unless already changed)
            if ($SubAttribute->getAttributeId() === $this) {
                $SubAttribute->setAttributeId(null);
            }
        }

        return $this;
    }
}
