<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\Erp\ErpManager;
use App\Repository\ErrorRepository;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class PurchaseHistoryProvider implements ProviderInterface
{
    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly ErrorRepository $errorRepository,
    )
    {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        $userExtId = $uriVariables['userExtId'];
        $sku = $uriVariables['sku'];
        $ErpManager = (new ErpManager($this->httpClient,$this->errorRepository))->PurchaseHistoryByUserAndSku($userExtId,$sku)->items;
        return $ErpManager;
    }
}
