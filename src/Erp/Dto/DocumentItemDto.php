<?php

namespace App\Erp\Dto;

class DocumentItemDto
{
    public ?string $sku;
    public ?string $title;
    public ?int $quantity;
    public ?int $priceByOne;
    public ?int $total;
    public ?int $discount;
}