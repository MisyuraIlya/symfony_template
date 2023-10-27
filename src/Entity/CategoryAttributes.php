<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\CategoryAttributesRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\Link;
use App\Entity\Category;

#[ApiResource(
    uriTemplate: 'category_attribute/{categoryId}',
    operations: [
        new GetCollection()
    ],
    uriVariables: [
        'categoryId' => new Link(fromProperty: 'categoryAttributes', fromClass: Category::class),
    ]
)]
#[ORM\Entity(repositoryClass: CategoryAttributesRepository::class)]
class CategoryAttributes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'categoryAttributes')]
    private ?Category $category = null;

    #[ORM\ManyToOne(inversedBy: 'categoryAttributes')]
    private ?SubAttribute $AttributeSub = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getAttributeSub(): ?SubAttribute
    {
        return $this->AttributeSub;
    }

    public function setAttributeSub(?SubAttribute $AttributeSub): static
    {
        $this->AttributeSub = $AttributeSub;

        return $this;
    }


}
