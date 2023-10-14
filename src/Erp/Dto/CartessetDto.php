<?php

namespace App\Erp\Dto;

class CartessetDto
{
    public ?int $glbCredTtl;
    public ?int $glbDeptTtL;
    public ?int $glbFinalttl;

    /** @var CartessetLineDto[] */
    public array $lines = [];
}