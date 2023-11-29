<?php

namespace App\Cron;

use App\Entity\Error;
use App\Entity\Product;
use App\Erp\ErpManager;
use App\Repository\CategoryRepository;
use App\Repository\ErrorRepository;
use App\Repository\ProductRepository;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GetProducts
{
    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private CategoryRepository $categoryRepository,
        private ProductRepository $productRepository,
        private readonly ErrorRepository $errorRepository,
    )
    {
    }

    public function sync()
    {
        $skip = 0;
        $pageSize = 50;
        do {
            $res = (new ErpManager($this->httpClient,$this->errorRepository))->GetProducts($pageSize, $skip);
            if (!empty($res->products)) {
                foreach ($res->products as $key => $itemRec) {
                    try {
                        $findCategoryLvl1 = $this->categoryRepository->findOneByExtId($itemRec->categoryId);
                        $product = $this->productRepository->findOneBySku($itemRec->sku);
                        if (!$product) {
                            $product = new Product();
                            $product->setSku($itemRec->sku);
                            $product->setCreatedAt(new \DateTimeImmutable());
                        }
                        $product->setOrden($key);
                        $product->setTitle($itemRec->title);
                        $product->setPackQuantity($itemRec->packQuantity);
                        $product->setBasePrice($itemRec->baseprice);
                        $product->setUpdatedAt(new \DateTimeImmutable());
                        $product->setIsPublished($itemRec->status);
                        $product->setCategoryLvl1($findCategoryLvl1);
                        $this->productRepository->createProduct($product, true);
                    } catch (\Throwable $e) {
                        $error = new Error();
                        $error->setFunctionName('cron get products');
                        $error->setDescription($e->getMessage());
                        $this->errorRepository->createError($error, true);
                        continue;
                    }
                }
                $skip += $pageSize;
            } else {
                break;
            }
        } while (true);
    }

}