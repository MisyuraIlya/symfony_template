<?php

namespace App\Cron;

use App\Erp\ErpManager;
use App\Repository\ProductRepository;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GetBasePrice
{
    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private ProductRepository $productRepository
    )
    {
    }

    public function sync()
    {
        $endpoint = "/PRICELIST";
        $queryParameters = [
            '$filter' => "PLNAME eq 'קB2B'",
            '$expand' => 'PARTPRICE2_SUBFORM',
        ];
        $queryString = http_build_query($queryParameters);
        $urlQuery = $endpoint . '?' . $queryString;

        $res = (new ErpManager($this->httpClient))->GetRequest($urlQuery);

        if($res) {
            foreach ($res as $itemRec) {
                foreach ($itemRec['PARTPRICE2_SUBFORM'] as $subRec) {
                    $product = $this->productRepository->findOneBySku($subRec['PARTNAME']);
                    if($product) {
                        $product->setBasePrice($subRec['PRICE']);
                        $this->productRepository->createProduct($product, true);
                    }

                }
            }
        }
    }
}