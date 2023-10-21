<?php

namespace App\ApiResource\Dto;

class CartDto
{
    public ?string $sku;
    public ?int $quantity;
    public ?int $price;
    public ?int $discount;
}