<?php

namespace App\Entity;

use ApiPlatform\Elasticsearch\Filter\TermFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\ProductRepository;
use App\State\ProductProvider;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\Ignore;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\Link;
use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ApiResource(
    operations: [
        new Get(),
        new GetCollection(),
        new Post(),
        new Put(),
        new Patch(),
    ],
    normalizationContext: [
        'groups' => ['product:read'],
    ],
    denormalizationContext: [
        'groups' => ['product:write'],
    ],
    paginationClientItemsPerPage: true,
    provider: ProductProvider::class,
)]
#[ApiFilter(TermFilter::class, properties: ['SubAttributes.id'])] // need to serach attributes
#[ApiFilter(
    SearchFilter::class,
    properties: [
        'sku' => 'exact',
        'title' => 'partial',
        'SubAttributes.id' => 'exact',
    ]
)]

#[ApiResource(
    uriTemplate: '/catalog/{lvl1}',
    operations: [
        new GetCollection(),
        new Get(),
    ],
    uriVariables: [
        'lvl1' => new Link(fromProperty: 'productsLvl1', fromClass: Category::class),
    ],
    normalizationContext: [
        'groups' => ['product:read'],
    ],
    denormalizationContext: [
        'groups' => ['product:write'],
    ],
    paginationClientItemsPerPage: true,
    provider: ProductProvider::class,

)]

#[ApiResource(
    uriTemplate: '/catalog/lvl1/{lvl2}',
    operations: [
        new GetCollection(),
        new Get(),
    ],
    uriVariables: [
        'lvl2' => new Link(fromProperty: 'productsLvl2', fromClass: Category::class),
    ],
    normalizationContext: [
        'groups' => ['product:read'],
    ],
    denormalizationContext: [
        'groups' => ['product:write'],
    ],
    paginationClientItemsPerPage: true,
)]
#[ApiResource(
    uriTemplate: '/catalog/lvl1/lvl2/{lvl3}',
    operations: [
        new GetCollection(),
        new Get()
    ],
    uriVariables: [
        'lvl3' => new Link(fromProperty: 'productsLvl3', fromClass: Category::class),
    ],
    normalizationContext: [
        'groups' => ['product:read'],
    ],
    denormalizationContext: [
        'groups' => ['product:write'],
    ],
    paginationClientItemsPerPage: true,
)]

class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['product:read','category:read'])]
    private ?int $id = null;

    #[Groups(['product:read','category:read'])]
    #[ORM\Column(length: 255)]
    private ?string $sku = null;

    #[Groups(['product:read','category:read'])]
    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[Groups(['product:read','category:read'])]
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[Groups(['product:read','category:read'])]
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $barcode = null;

    #[Groups(['product:read','category:read'])]
    #[ORM\Column]
    private ?bool $isPublished = null;

    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: "productsLvl1")]
    private ?Category $categoryLvl1 = null;

    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: "productsLvl2")]
    private ?Category $categoryLvl2 = null;

    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: "productsLvl3")]
    private ?Category $categoryLvl3 = null;

    #[Groups(['product:read','category:read'])]
    #[ORM\OneToMany(mappedBy: 'product', targetEntity: ProductImages::class)]
    private Collection $imagePath;

    #[Ignore]
    #[ORM\OneToMany(mappedBy: 'sku', targetEntity: Migvan::class)]
    private Collection $migvans;

    #[Groups(['product:read','category:read'])]
    #[ORM\OneToMany(mappedBy: 'product', targetEntity: PriceListDetailed::class)]
    private Collection $priceListDetaileds;

    #[Groups(['product:read','category:read','SubAttribute:read'])]
    #[ORM\OneToMany(mappedBy: 'product', targetEntity: SubAttribute::class)]
    private Collection $SubAttributes;

    #[Groups(['product:read','category:read'])]
    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[Groups(['product:read','category:read'])]
    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[Groups(['product:read','category:read'])]
    #[ORM\Column(nullable: true)]
    private ?int $basePrice = null;

    #[Groups(['product:read','category:read'])]
    #[ORM\Column(nullable: true)]
    private ?int $finalPrice = null;

    #[Groups(['product:read','category:read'])]
    #[ORM\Column]
    private ?int $stock = 0;

    #[Groups(['product:read','category:read'])]
    #[ORM\Column(nullable: true)]
    private ?int $packQuantity = null;

    #[ORM\OneToMany(mappedBy: 'parent', targetEntity: SubProduct::class)]
    private Collection $subProducts;



    public function __construct()
    {
        $this->imagePath = new ArrayCollection();
        $this->migvans = new ArrayCollection();
        $this->priceListDetaileds = new ArrayCollection();
        $this->SubAttributes = new ArrayCollection();
        $this->subProducts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function setSku(string $sku): static
    {
        $this->sku = $sku;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getBarcode(): ?string
    {
        return $this->barcode;
    }

    public function setBarcode(?string $barcode): static
    {
        $this->barcode = $barcode;

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

    public function getCategoryLvl1(): ?category
    {
        return $this->categoryLvl1;
    }

    public function setCategoryLvl1(?category $categoryLvl1): static
    {
        $this->categoryLvl1 = $categoryLvl1;

        return $this;
    }

    public function getCategoryLvl2(): ?category
    {
        return $this->categoryLvl2;
    }

    public function setCategoryLvl2(?category $categoryLvl2): static
    {
        $this->categoryLvl2 = $categoryLvl2;

        return $this;
    }

    public function getCategoryLvl3(): ?category
    {
        return $this->categoryLvl3;
    }

    public function setCategoryLvl3(?category $categoryLvl3): static
    {
        $this->categoryLvl3 = $categoryLvl3;

        return $this;
    }

    /**
     * @return Collection<int, ProductImages>
     */
    public function getImagePath(): Collection
    {
        return $this->imagePath;
    }

    public function addImagePath(ProductImages $imagePath): static
    {
        if (!$this->imagePath->contains($imagePath)) {
            $this->imagePath->add($imagePath);
            $imagePath->setProductId($this);
        }

        return $this;
    }

    public function removeImagePath(ProductImages $imagePath): static
    {
        if ($this->imagePath->removeElement($imagePath)) {
            // set the owning side to null (unless already changed)
            if ($imagePath->getProductId() === $this) {
                $imagePath->setProductId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Migvan>
     */
    public function getMigvans(): Collection
    {
        return $this->migvans;
    }

    public function addMigvan(Migvan $migvan): static
    {
        if (!$this->migvans->contains($migvan)) {
            $this->migvans->add($migvan);
            $migvan->setSku($this);
        }

        return $this;
    }

    public function removeMigvan(Migvan $migvan): static
    {
        if ($this->migvans->removeElement($migvan)) {
            // set the owning side to null (unless already changed)
            if ($migvan->getSku() === $this) {
                $migvan->setSku(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PriceListDetailed>
     */
    public function getPriceListDetaileds(): Collection
    {
        return $this->priceListDetaileds;
    }

    public function addPriceListDetailed(PriceListDetailed $priceListDetailed): static
    {
        if (!$this->priceListDetaileds->contains($priceListDetailed)) {
            $this->priceListDetaileds->add($priceListDetailed);
            $priceListDetailed->setProductId($this);
        }

        return $this;
    }

    public function removePriceListDetailed(PriceListDetailed $priceListDetailed): static
    {
        if ($this->priceListDetaileds->removeElement($priceListDetailed)) {
            // set the owning side to null (unless already changed)
            if ($priceListDetailed->getProductId() === $this) {
                $priceListDetailed->setProductId(null);
            }
        }

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
            $SubAttribute->setProductId($this);
        }

        return $this;
    }

    public function removeSubAttribute(SubAttribute $SubAttribute): static
    {
        if ($this->SubAttributes->removeElement($SubAttribute)) {
            // set the owning side to null (unless already changed)
            if ($SubAttribute->getProductId() === $this) {
                $SubAttribute->setProductId(null);
            }
        }

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getBasePrice(): ?int
    {
        return $this->basePrice;
    }

    public function setBasePrice(?int $basePrice): static
    {
        $this->basePrice = $basePrice;

        return $this;
    }

    public function getFinalPrice(): ?int
    {
        return $this->finalPrice;
    }

    public function setFinalPrice(?int $finalPrice): static
    {
        $this->finalPrice = $finalPrice;

        return $this;
    }

    public function getPackQuantity(): ?int
    {
        return $this->packQuantity;
    }

    public function setPackQuantity(?int $packQuantity): static
    {
        $this->packQuantity = $packQuantity;

        return $this;
    }

    /**
     * @return Collection<int, SubProduct>
     */
    public function getSubProducts(): Collection
    {
        return $this->subProducts;
    }

    public function addSubProduct(SubProduct $subProduct): static
    {
        if (!$this->subProducts->contains($subProduct)) {
            $this->subProducts->add($subProduct);
            $subProduct->setParent($this);
        }

        return $this;
    }

    public function removeSubProduct(SubProduct $subProduct): static
    {
        if ($this->subProducts->removeElement($subProduct)) {
            // set the owning side to null (unless already changed)
            if ($subProduct->getParent() === $this) {
                $subProduct->setParent(null);
            }
        }

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(?int $stock): static
    {
        $this->stock = $stock;

        return $this;
    }
}
