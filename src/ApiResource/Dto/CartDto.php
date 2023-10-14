<?php

namespace App\ApiResource\Dto;

use App\Entity\Product;

class CartDto
{
    public ?string $sku;
    public ?int $quantity;
    public ?int $price;
    public ?int $total;
    public ?int $discount;
}