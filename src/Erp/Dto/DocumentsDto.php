<?php

namespace App\Erp\Dto;
use App\Erp\Dto\DocumentDto;

class DocumentsDto
{
    /** @var DocumentDto[] */
    public $documents = [];

    public $selectBox = [
        'הכל',
        'הזמנות',
        'הצעות מחיר',
        'תעודות משלוח',
        'חשבוניות מס',
        'חשבוניות מס מרכזות',
        'החזרות'
    ];
}