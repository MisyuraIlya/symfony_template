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
        new Post(),
    ],
    processor: SendOrderProcessor::class
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

}