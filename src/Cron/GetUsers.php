<?php

namespace App\Cron;
use App\Entity\User;
use App\Erp\ErpManager;
use App\Repository\PriceListRepository;
use App\Repository\UserRepository;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GetUsers
{

    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly UserRepository $repository,
        private readonly PriceListRepository $priceListRepository,
    )
    {}

    public function sync()
    {
        $response = (new ErpManager($this->httpClient))->GetUsers();
        foreach ($response->users as $itemRec) {
            $user = $this->repository->findOneByExIdAndPhone($itemRec->userExId, $itemRec->phone);
            $priceList = null;
            if($itemRec->priceList){
                $priceList = $this->priceListRepository->findOneByExtId($itemRec->priceList);
            }
            if(empty($user)){
                $user = new User();
                $user->setExtId($itemRec->userExId);
                $user->setPhone($itemRec->phone);
                $user->setCreatedAt(new \DateTimeImmutable());
                $user->setIsRegistered(false);
            }
            if($priceList){
                $user->setPriceList($priceList);
            }
            $user->setIsBlocked($itemRec->isBlocked);
            $user->setUpdatedAt(new \DateTimeImmutable());
            $user->setName($itemRec->name);
            $this->repository->createUser($user, true);
        }
    }
}