<?php

namespace App\Cron;

use App\Repository\AttributeMainRepository;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GetMainAttributes
{
    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly AttributeMainRepository $attributeMainRepository,
    )
    {
    }

    public function sync()
    {

    }
}