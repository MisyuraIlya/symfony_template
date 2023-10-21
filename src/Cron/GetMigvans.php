<?php

namespace App\Cron;

use App\Entity\Migvan;
use App\Erp\ErpManager;
use App\Repository\MigvanRepository;
use App\Repository\ProductRepository;
use App\Repository\UserRepository;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GetMigvans
{
    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly MigvanRepository $migvanRepository,
        private readonly UserRepository $userRepository,
        private readonly ProductRepository $productRepository,
    )
    {
    }

    public function sync()
    {
        $response = (new ErpManager($this->httpClient))->GetMigvan();

        foreach ($response->migvans as $itemRec) {
            try {
                $findUser = $this->userRepository->findOneByExtId($itemRec->userExId);
                $findProduct = $this->productRepository->findOneBySku($itemRec->sku);
                if($findUser && $findProduct){
                    $migvan = $this->migvanRepository->findOneBySkuAndUserExtId($findProduct->getId(), $findUser->getId());
                    if(empty($migvan)){
                        $migvan = new Migvan();
                        $migvan->setCreatedAt(new \DateTimeImmutable());
                        $migvan->setUpdatedAt(new \DateTimeImmutable());
                        $migvan->setIsPublished(1);
                        $migvan->setSku($findProduct);
                        $migvan->setUser($findUser);
                        $this->migvanRepository->createMigvan($migvan, true);
                    }
                }
            } catch (\Exception $e) {
                continue;
            }
        }
    }
}