<?php

namespace App\ApiResource\Dto;

use App\Entity\Product;

class CartsDto
{
    /** @var Product[] */
    public array $cart = [];
}