<?php

namespace App\ApiResource\Dto;

class CartItemDto
{
    public ?string $sku;
    public ?int $quantity;
    public ?float $price;
    public ?int $discount;
    public ?float $total;
}