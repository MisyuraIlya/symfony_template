<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\HistoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\User;

#[ORM\Entity(repositoryClass: HistoryRepository::class)]
#[ApiResource]
class History
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $orderExtId = null;

    #[ORM\ManyToOne(inversedBy: 'histories')]
    private ?User $user = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $deliveryDate = null;

    #[ORM\Column(nullable: true)]
    private ?int $discount = null;

    #[ORM\Column(nullable: true)]
    private ?int $total = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $orderComment = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $orderStatus = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(nullable: true)]
    private ?int $deliveryPrice = null;

    #[ORM\OneToMany(mappedBy: 'history', targetEntity: HistoryDetailed::class)]
    private Collection $historyDetaileds;

    public function __construct()
    {
        $this->historyDetaileds = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderExtId(): ?string
    {
        return $this->orderExtId;
    }

    public function setOrderExtId(?string $orderExtId): static
    {
        $this->orderExtId = $orderExtId;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getDeliveryDate(): ?\DateTimeInterface
    {
        return $this->deliveryDate;
    }

    public function setDeliveryDate(?\DateTimeInterface $deliveryDate): static
    {
        $this->deliveryDate = $deliveryDate;

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

    public function getOrderComment(): ?string
    {
        return $this->orderComment;
    }

    public function setOrderComment(?string $orderComment): static
    {
        $this->orderComment = $orderComment;

        return $this;
    }

    public function getOrderStatus(): ?string
    {
        return $this->orderStatus;
    }

    public function setOrderStatus(?string $orderStatus): static
    {
        $this->orderStatus = $orderStatus;

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

    public function getDeliveryPrice(): ?int
    {
        return $this->deliveryPrice;
    }

    public function setDeliveryPrice(?int $deliveryPrice): static
    {
        $this->deliveryPrice = $deliveryPrice;

        return $this;
    }

    /**
     * @return Collection<int, HistoryDetailed>
     */
    public function getHistoryDetaileds(): Collection
    {
        return $this->historyDetaileds;
    }

    public function addHistoryDetailed(HistoryDetailed $historyDetailed): static
    {
        if (!$this->historyDetaileds->contains($historyDetailed)) {
            $this->historyDetaileds->add($historyDetailed);
            $historyDetailed->setHistoryId($this);
        }

        return $this;
    }

    public function removeHistoryDetailed(HistoryDetailed $historyDetailed): static
    {
        if ($this->historyDetaileds->removeElement($historyDetailed)) {
            // set the owning side to null (unless already changed)
            if ($historyDetailed->getHistoryId() === $this) {
                $historyDetailed->setHistoryId(null);
            }
        }

        return $this;
    }
}
