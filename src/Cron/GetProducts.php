<?php

namespace App\Cron;

use App\Entity\Product;
use App\Erp\ErpManager;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GetProducts
{
    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private CategoryRepository $categoryRepository,
        private ProductRepository $productRepository
    )
    {
    }

    public function sync()
    {
        $res = (new ErpManager($this->httpClient))->GetProducts();
        foreach ($res->products as $itemRec){
            $findCategory = $this->categoryRepository->findOneByExtId($itemRec->categoryId);
            $product = $this->productRepository->findOneBySku($itemRec->sku);
            if(!$product){
                $product = new Product();
                $product->setSku($itemRec->sku);
                $product->setCreatedAt(new \DateTimeImmutable());
            }

            $product->setTitle($itemRec->title);
            $product->setBasePrice($itemRec->baseprice);
            $product->setUpdatedAt(new \DateTimeImmutable());
            $product->setIsPublished($itemRec->status);
            $product->setCategoryLvl1($findCategory);
            $this->productRepository->createProduct($product, true);

        }
//
//        foreach ($res->pr)
    }
}