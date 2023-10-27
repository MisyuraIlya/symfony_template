<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SubAttributeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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



    #[Groups(['product:read','SubAttribute:read', 'attribute:read'])]
    #[ORM\ManyToOne(inversedBy: 'SubAttributes')]
    private ?AttributeMain $attribute = null;

    #[Groups(['product:read','SubAttribute:read', 'attribute:read'])]
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $title = null;

    #[ORM\OneToMany(mappedBy: 'AttributeSub', targetEntity: CategoryAttributes::class)]
    private Collection $categoryAttributes;

    #[ORM\OneToMany(mappedBy: 'attributeSub', targetEntity: ProductAttribute::class)]
    private Collection $productAttributes;

    public function __construct()
    {
        $this->categoryAttributes = new ArrayCollection();
        $this->productAttributes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection<int, CategoryAttributes>
     */
    public function getCategoryAttributes(): Collection
    {
        return $this->categoryAttributes;
    }

    public function addCategoryAttribute(CategoryAttributes $categoryAttribute): static
    {
        if (!$this->categoryAttributes->contains($categoryAttribute)) {
            $this->categoryAttributes->add($categoryAttribute);
            $categoryAttribute->setAttributeSub($this);
        }

        return $this;
    }

    public function removeCategoryAttribute(CategoryAttributes $categoryAttribute): static
    {
        if ($this->categoryAttributes->removeElement($categoryAttribute)) {
            // set the owning side to null (unless already changed)
            if ($categoryAttribute->getAttributeSub() === $this) {
                $categoryAttribute->setAttributeSub(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProductAttribute>
     */
    public function getProductAttributes(): Collection
    {
        return $this->productAttributes;
    }

    public function addProductAttribute(ProductAttribute $productAttribute): static
    {
        if (!$this->productAttributes->contains($productAttribute)) {
            $this->productAttributes->add($productAttribute);
            $productAttribute->setAttributeSub($this);
        }

        return $this;
    }

    public function removeProductAttribute(ProductAttribute $productAttribute): static
    {
        if ($this->productAttributes->removeElement($productAttribute)) {
            // set the owning side to null (unless already changed)
            if ($productAttribute->getAttributeSub() === $this) {
                $productAttribute->setAttributeSub(null);
            }
        }

        return $this;
    }
}
