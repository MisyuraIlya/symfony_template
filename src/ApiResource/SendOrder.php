<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Post;
use App\ApiResource\Dto\CartDto;
use App\Entity\HistoryDetailed;
use App\State\SendOrderProcessor;

#[ApiResource(
    shortName: 'SendOrder',
    operations: [
        new Post(
            processor: SendOrderProcessor::class
        ),
    ],
)]
class SendOrder
{
    public ?int $id = null;

    public ?string $userExtId = null;

    public ?int $total = null;

    public ?int $discount = null;

    public ?string $name = null;

    public ?int $deliveryPrice = null;

    public ?\DateTimeImmutable $deliveryDate = null;

    public ?\DateTimeImmutable $createdAt = null;

    public ?string $comment = null;

//    /**
//     * @var array<int, HistoryDetailed>
//     */
    /**
     * @var CartDto[]>
     */
    public array $products = [];

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getUserExtId(): ?string
    {
        return $this->userExtId;
    }

    /**
     * @param string|null $userExtId
     */
    public function setUserExtId(?string $userExtId): void
    {
        $this->userExtId = $userExtId;
    }

    /**
     * @return int|null
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }

    /**
     * @param int|null $total
     */
    public function setTotal(?int $total): void
    {
        $this->total = $total;
    }

    /**
     * @return int|null
     */
    public function getDiscount(): ?int
    {
        return $this->discount;
    }

    /**
     * @param int|null $discount
     */
    public function setDiscount(?int $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int|null
     */
    public function getDeliveryPrice(): ?int
    {
        return $this->deliveryPrice;
    }

    /**
     * @param int|null $deliveryPrice
     */
    public function setDeliveryPrice(?int $deliveryPrice): void
    {
        $this->deliveryPrice = $deliveryPrice;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getDeliveryDate(): ?\DateTimeImmutable
    {
        return $this->deliveryDate;
    }

    /**
     * @param \DateTimeImmutable|null $deliveryDate
     */
    public function setDeliveryDate(?\DateTimeImmutable $deliveryDate): void
    {
        $this->deliveryDate = $deliveryDate;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTimeImmutable|null $createdAt
     */
    public function setCreatedAt(?\DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string|null $comment
     */
    public function setComment(?string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param array $products
     */
    public function setProducts(array $products): void
    {
        $this->products = $products;
    }



}