<?php

namespace App\Cron;

use App\Entity\Category;
use App\Entity\Error;
use App\Erp\ErpManager;
use App\Repository\CategoryRepository;
use App\Repository\ErrorRepository;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GetCategories
{
    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private CategoryRepository $categoryRepository,
        private readonly ErrorRepository $errorRepository,
    )
    {
    }

    public function sync()
    {

        try {
            $response = (new ErpManager($this->httpClient,$this->errorRepository))->GetCategories();
            foreach ($response->categories as $catRec) {
                $category = $this->categoryRepository->findOneByExtId($catRec->categoryId);
                if(!$category){
                    $category = new Category();
                    $category->setExtId($catRec->categoryId);
                }
                $category->setIsPublished(true);
                $category->setLvlNumber(1);
                $category->setTitle($catRec->categoryName);
                $this->categoryRepository->createCategory($category, true);
            }

        } catch (\Exception $e) {
            $error = new Error();
            $error->setFunctionName('cron categories');
            $error->setDescription($e->getMessage());
            $this->errorRepository->createError($error, true);
        }
    }
}