<?php

namespace App\Cron;

use App\Entity\AttributeMain;
use App\Entity\SubAttribute;
use App\Erp\ErpManager;
use App\Repository\AttributeMainRepository;
use App\Repository\SubAttributeRepository;
use App\Repository\ProductRepository;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use function PHPUnit\Framework\at;

class GetSubAttributes
{
    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly SubAttributeRepository $subAttributeRepository,
        private readonly ProductRepository $productRepository,
        private readonly AttributeMainRepository $attributeMainRepository,
    )
    {}

    public function sync()
    {
        $response = (new ErpManager($this->httpClient))->GetProducts();

        foreach ($response->products as $itemRec) {
            if($itemRec->status) {

                $attribute = $this->subAttributeRepository->findOneBySkuAndTitle($itemRec->sku, $itemRec->Extra3);
                $product = $this->productRepository->findOneBySku($itemRec->sku);
                $attributeMain = $this->attributeMainRepository->findOneByExtId(999);

                if(empty($attribute)){
                    $attribute = new SubAttribute();
                    $attribute->setProduct($product);
                    $attribute->setTitle($itemRec->Extra3);
                }

                $attribute->setAttribute($attributeMain); //TODO IT MANNUALY SET NEED FROM PRIORITY
                $this->subAttributeRepository->createSubAttribute($attribute,true);
            }

        }
    }
}