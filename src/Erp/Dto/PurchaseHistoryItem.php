<?php

namespace App\Erp\Dto;

class PurchaseHistoryItem
{
    public ?string $documentNumber;
    public ?string $date;
    public ?int $quantity;
    public ?int $price;
    public ?int $vatPrice;
    public ?int $discount;
    public ?int $totalPrice;
    public ?int $vatTotal;
}