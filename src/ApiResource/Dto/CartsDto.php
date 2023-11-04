<?php

namespace App\ApiResource\Dto;

use App\ApiResource\RestoreCart;
use App\Entity\Product;
use App\Enum\DocumentTypeHistory;

class CartsDto
{
    /** @var RestoreCart[] */
    public array $cart = [];

}