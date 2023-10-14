<?php

namespace App\Cron;

use App\Entity\Category;
use App\Erp\ErpManager;
use App\Repository\CategoryRepository;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GetCategories
{
    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private CategoryRepository $categoryRepository
    )
    {
    }

    public function sync()
    {
        $response = (new ErpManager($this->httpClient))->GetCategories();
        foreach ($response->categories as $itemRec){
            if($itemRec->categoryName) {
                $category = $this->categoryRepository->findOneByExtId($itemRec->categoryId);
                if(!$category){
                    $category = new Category();
                    $category->setExtId($itemRec->categoryId);
                    $category->setIsPublished(true);
                }
                $category->setLvlNumber(1);
                $category->setTitle($itemRec->categoryName);
                $this->categoryRepository->createCategory($category, true);
            }
        }
    }
}