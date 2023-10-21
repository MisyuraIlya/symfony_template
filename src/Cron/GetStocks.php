<?php

namespace App\Cron;

use App\Entity\Product;
use App\Erp\ErpManager;
use App\Repository\ProductRepository;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GetStocks
{

    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private ProductRepository $productRepository
    )
    {
    }

    public function sync()
    {
        $res = (new ErpManager($this->httpClient))->GetStocks();
        foreach ($res->stocks as $itemRec){
            $product = $this->productRepository->findOneBySku($itemRec->sku);
            if($product){
                $product->setStock($itemRec->stock);
                $this->productRepository->createProduct($product, true);

            }
        }
    }
}