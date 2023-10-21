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
        $response = (new ErpManager($this->httpClient))->GetProducts();

        foreach ($response->products as $itemRec){
            if ($itemRec->Extra18) {
                $categoryLvl1 = $this->categoryRepository->findOneByExtId($itemRec->Extra18);
                if(!$categoryLvl1){
                    $categoryLvl1 = new Category();
                    $categoryLvl1->setExtId($itemRec->Extra18);
                    $categoryLvl1->setIsPublished(true);
                    $categoryLvl1->setLvlNumber(1);
                    $categoryLvl1->setTitle($itemRec->Extra18);
                    $this->categoryRepository->createCategory($categoryLvl1, true);
                }

            }

            if ($itemRec->Extra18 && $itemRec->Extra2) {
                $categoryLvl2 = $this->categoryRepository->findOneByExtId($itemRec->Extra2);
                if(!$categoryLvl2){
                    $categoryLvl2 = new Category();
                    $categoryLvl2->setExtId($itemRec->Extra2);
                    $categoryLvl2->setIsPublished(true);
                    $categoryLvl2->setLvlNumber(2);
                    $categoryLvl2->setTitle($itemRec->Extra2);
                    $categoryLvl2->setParent($categoryLvl1);
                    $this->categoryRepository->createCategory($categoryLvl2, true);
                }
            }

            if ($itemRec->Extra18 && $itemRec->Extra2 && $itemRec->Extra6) {
                $categoryLvl3 = $this->categoryRepository->findOneByExtId($itemRec->Extra6);
                if(!$categoryLvl3){
                    $categoryLvl3 = new Category();
                    $categoryLvl3->setExtId($itemRec->Extra6);
                    $categoryLvl3->setIsPublished(true);
                    $categoryLvl3->setLvlNumber(3);
                    $categoryLvl3->setTitle($itemRec->Extra6);
                    $categoryLvl3->setParent($categoryLvl2);
                    $this->categoryRepository->createCategory($categoryLvl3, true);
                }
            }

        }
    }
}