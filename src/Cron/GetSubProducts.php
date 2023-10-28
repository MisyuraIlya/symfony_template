<?php

namespace App\Cron;

use App\Entity\Error;
use App\Entity\SubProduct;
use App\Erp\ErpManager;
use App\Repository\ErrorRepository;
use App\Repository\ProductRepository;
use App\Repository\SubProductRepository;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GetSubProducts
{
    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly SubProductRepository $subProductRepository,
        private readonly ProductRepository $productRepository,
        private readonly ErrorRepository $errorRepository,
    )
    {
    }

    public function sync()
    {


        try {
            $response = (new ErpManager($this->httpClient))->GetSubProducts();
            foreach ($response->products as $itemRec){
                $subProduct = $this->subProductRepository->findOneBySku($itemRec->sku);
                $findProduct = $this->productRepository->findOneBySku($itemRec->parent);
                if($findProduct){
                    if(!$subProduct){
                        $subProduct = new SubProduct();
                        $subProduct->setSku($itemRec->sku);
                        $subProduct->setCreatedAt(new \DateTimeImmutable());
                        $subProduct->setIsPublished(true);
                        $subProduct->setParent($findProduct);
                    }
                    $subProduct->setTitle($itemRec->title);
                    $subProduct->setUpdatedAt(new \DateTimeImmutable());
                    $this->subProductRepository->createSubProduct($subProduct, true);
                }

            }
        } catch (\Exception $e) {
            $error = new Error();
            $error->setFunctionName('cron get sub products');
            $error->setDescription($e->getMessage());
            $this->errorRepository->createError($error, true);
        }
    }
}