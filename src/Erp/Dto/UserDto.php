<?php

namespace App\Erp\Dto;

class UserDto
{
    public ?string $userExId;
    public ?string $userDescription;
    public ?string $name;
    public ?string $telephone;
    public ?string $phone;
    public ?string $address;
    public ?string $town;
    public ?string $hp;
    public ?int $maxObligo;
    public ?int $maxCredit;
    public ?int $globalDiscount;
    public ?bool $isBlocked;
}