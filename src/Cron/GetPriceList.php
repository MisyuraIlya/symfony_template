<?php

namespace App\Cron;

use App\Entity\PriceList;
use App\Erp\ErpManager;
use App\Repository\PriceListRepository;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GetPriceList
{
    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly PriceListRepository $priceListRepository
    )
    {
    }

    public function sync()
    {
        $response = (new ErpManager($this->httpClient))->GetPriceList();
        foreach ($response->priceLists as $itemRec){
            $priceList = $this->priceListRepository->findOneByExtId($itemRec->priceListExtId);
            if(!$priceList){
                $priceList = new PriceList();
                $priceList->setExtId($itemRec->priceListExtId);
            }
            $priceList->setTitle($itemRec->priceListTitle);
            $this->priceListRepository->createPriceList($priceList,true);
        }
    }
}