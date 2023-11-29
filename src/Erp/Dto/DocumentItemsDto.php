<?php

namespace App\Erp\Dto;

class DocumentItemsDto
{
    /** @var DocumentItemDto[] */
    public $products = [];

    public ?int $totalTax;
    public ?int $totalPriceAfterTax;
    public ?int $totalAfterDiscount;
    public ?int $totalPrecent;

    public ?string $documentType;
}