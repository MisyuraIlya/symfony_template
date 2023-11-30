<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use ApiPlatform\Doctrine\Orm\State\CollectionProvider;
use ApiPlatform\Doctrine\Orm\State\ItemProvider;
use App\Entity\Error;
use App\Entity\Product;
use App\Entity\User;
use App\Erp\Dto\PricesDto;
use App\Erp\ErpManager;
use App\Repository\ErrorRepository;
use App\Repository\PriceListUserRepository;
use App\Repository\ProductRepository;
use App\Repository\UserRepository;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use ApiPlatform\Metadata\CollectionOperationInterface;
use ApiPlatform\Doctrine\Orm\Paginator;
use ApiPlatform\State\Pagination\TraversablePaginator;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ProductProvider implements ProviderInterface
{

    private array $skus = [];
    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly RequestStack $requestStack,
        #[Autowire(service: CollectionProvider::class)] private ProviderInterface $collectionProvider,
        #[Autowire(service: ItemProvider::class)] private ProviderInterface $itemProvider,
        private readonly PriceListUserRepository $priceListUserRepository,
        private readonly UserRepository $userRepository,
        private readonly ProductRepository $productRepository,
        private readonly ErrorRepository $errorRepository,
    )
    {
        $this->ErpManager = new ErpManager($httpClient,$this->errorRepository);
        $this->isOnlinePrice = $_ENV['IS_ONLINE_PRICE'] === "true";
        $this->isOnlineStock = $_ENV['IS_ONLINE_STOCK'] === "true";
        $this->isOnlineMigvan = $_ENV['IS_ONLINE_MIGVAN'] === "true";
        $this->isUsedMigvan = $_ENV['IS_USED_MIGVAN'] === "true";
    }


    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        try {
            $migvanOnline = null;
            $userExtId =  $this->requestStack->getCurrentRequest()->get('userExtId');
            $userDb = $this->userRepository->findFirstExtId($userExtId);

            if($this->isOnlineMigvan && $userExtId && $this->isUsedMigvan){
                $migvanOnline = ($this->ErpManager->GetMigvanOnline($userExtId))->migvans;
            }

            $data = $this->GetDbData($migvanOnline);
            assert($data instanceof Paginator);

            if($this->isOnlinePrice && count($data) >0) {
                $this->GetOnlinePrice($data,$userDb);
            } else {
                $this->GetDbPrice($data);
            }

            if($this->isOnlineStock && count($data) > 0) {
                $this->GetOnlineStock($data);
            }

            return new TraversablePaginator(
                new \ArrayIterator($data->getIterator()),
                $data->getCurrentPage(),
                $data->getItemsPerPage(),
                $data->getTotalItems()
            );
        } catch (\Throwable $exception) {
            $error = new Error();
            $error->setDescription($exception->getMessage());
            $error->setFunctionName('Product provider state');
            $this->errorRepository->createError($error,true);
            $obj =  new \stdClass();
            $obj->error = $exception->getMessage();
            return $obj;
        }
    }

    private function GetDbData($onlineMigvan)
    {
        $lvl1 = (int) $this->requestStack->getCurrentRequest()->attributes->get('lvl1');
        $lvl2 = (int) $this->requestStack->getCurrentRequest()->attributes->get('lvl2');
        $lvl3 = (int) $this->requestStack->getCurrentRequest()->attributes->get('lvl3');
        $orderBy =  $this->requestStack->getCurrentRequest()->get('orderBy');
        $userExtId =  $this->requestStack->getCurrentRequest()->get('userExtId');
        $page = (int)  $this->requestStack->getCurrentRequest()->get('page', 1);
        $itemsPerPage = (int)  $this->requestStack->getCurrentRequest()->get('itemsPerPage',24);
        $attributes =  $this->requestStack->getCurrentRequest()->get('attributes');
        $searchValue = $this->requestStack->getCurrentRequest()->get('search');
        if($this->isUsedMigvan) {
            $userExtId = null; // if there no migvan then userExtId must be null to fetch all categories
        }
        if($this->isOnlineMigvan){
            $data = $this->productRepository->getCatalogByMigvanArray($page, $userExtId, $itemsPerPage, $lvl1, $lvl2, $lvl3, $orderBy, $attributes,$searchValue, $onlineMigvan);
        } else {
            $data = $this->productRepository->getCatalog($page, $userExtId, $itemsPerPage, $lvl1, $lvl2, $lvl3, $orderBy, $attributes,$searchValue);
        }
        $this->GetSkus($data);
        return $data;
    }

    private function GetOnlinePrice(Paginator $data, User $userDb)
    {
//        $priceList = $this->requestStack->getCurrentRequest()->query->get('priceList');

        $prices = $userDb->getPriceListUsers();
        $priceListsArr = [];
        foreach ($prices as $itemRec){
            $priceListsArr[] =  $itemRec->getPriceListId()->getExtId();
        }
        //IF THERE NO PRICE LIST GO TO DB BASE PRICE
        if(!empty($priceListsArr)){
            $response = $this->ErpManager->GetPricesOnline($this->skus,$priceListsArr);
            foreach ($response->prices as $priceRec){
                foreach ($data as $dataRec){
                    assert($dataRec instanceof Product);
                    if($dataRec->getSku() === $priceRec->sku){
                        if($priceRec->price){
                            $dataRec->setFinalPrice($priceRec->price);
                        }
                        if($priceRec->discountPrecent){
                            $dataRec->setDiscount($priceRec->discountPrecent);
                        }
                    }
                }
            }
        } else {
            $this->GetDbPrice($data);
        }
    }

    private function GetDbPrice(Paginator $data)
    {
        $priceList = $this->requestStack->getCurrentRequest()->query->get('priceList');

        foreach ($data as $entity) {
            $finalPrice = 0;
            if($entity->getBasePrice()){
                $finalPrice = $entity->getBasePrice();
            }
            $prices = $entity->getPriceListDetaileds();
            foreach ($prices as $subRec){
                if($subRec->getPriceListExId() === $priceList) {
                    $finalPrice = $subRec->getPrice();
                }
            }
            $entity->setFinalPrice($finalPrice);
        }

    }

    private function GetOnlineStock(Paginator $data)
    {
        $response = $this->ErpManager->GetStocksOnline($this->skus);
        foreach ($response->stocks as $stockRec){
            foreach ($data as $itemRec){
                assert($itemRec instanceof Product);
                if($itemRec->getSku() === $stockRec->sku){
                    $itemRec->setStock($stockRec->stock);
                }
            }
        }
    }

    private function GetSkus(Paginator $data)
    {
        $arraySkus = [];
        foreach ($data as $entity) {
            $arraySkus[] = $entity->getSku();
        }
        $this->skus =  $arraySkus;
    }

}
