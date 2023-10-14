<?php

namespace App\Cron;

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
        private readonly SubAttributeRepository $SubAttributeRepository,
        private readonly ProductRepository $productRepository,
        private readonly AttributeMainRepository $attributeMainRepository,
    )
    {}

    public function sync()
    {
        $response = (new ErpManager($this->httpClient))->GetProducts();
        foreach ($response->products as $itemRec){
            $product = $this->productRepository->findOneBySku($itemRec->sku);
            if($itemRec->Extra11) {
                $attribute = $this->SubAttributeRepository->findOneBySkuAndAttributeMain($itemRec->sku, 1);
                $attributeMain = $this->attributeMainRepository->findOneByExtId(1);
                if(empty($attribute)){
                    $attribute = new SubAttribute();
                    $attribute->setProduct($product);
                    $attribute->setAttribute($attributeMain);
                }
                $attribute->setTitle($itemRec->Extra11);
                $this->SubAttributeRepository->createSubAttribute($attribute, true);


            }
            if($itemRec->Extra12) {
                $attribute = $this->SubAttributeRepository->findOneBySkuAndAttributeMain($itemRec->sku, 2);
                $attributeMain = $this->attributeMainRepository->findOneByExtId(2);
                if(empty($attribute)){
                    $attribute = new SubAttribute();
                    $attribute->setProduct($product);
                    $attribute->setAttribute($attributeMain);
                }
                $attribute->setTitle($itemRec->Extra12);
                $this->SubAttributeRepository->createSubAttribute($attribute, true);
            }
            if($itemRec->Extra13) {
                $attribute = $this->SubAttributeRepository->findOneBySkuAndAttributeMain($itemRec->sku, 3);
                $attributeMain = $this->attributeMainRepository->findOneByExtId(3);
                if(empty($attribute)){
                    $attribute = new SubAttribute();
                    $attribute->setProduct($product);
                    $attribute->setAttribute($attributeMain);
                }
                $attribute->setTitle($itemRec->Extra13);
                $this->SubAttributeRepository->createSubAttribute($attribute, true);
            }
            if($itemRec->Extra14) {
                $attribute = $this->SubAttributeRepository->findOneBySkuAndAttributeMain($itemRec->sku, 4);
                $attributeMain = $this->attributeMainRepository->findOneByExtId(4);
                if(empty($attribute)){
                    $attribute = new SubAttribute();
                    $attribute->setProduct($product);
                    $attribute->setAttribute($attributeMain);
                }
                $attribute->setTitle($itemRec->Extra14);
                $this->SubAttributeRepository->createSubAttribute($attribute, true);
            }

        }
    }
}