<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use ApiPlatform\Doctrine\Orm\State\CollectionProvider;
use ApiPlatform\Doctrine\Orm\State\ItemProvider;
use App\Erp\Dto\PricesDto;
use App\Erp\ErpManager;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use ApiPlatform\Metadata\CollectionOperationInterface;
use ApiPlatform\Doctrine\Orm\Paginator;
use ApiPlatform\State\Pagination\TraversablePaginator;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ProductProvider implements ProviderInterface
{

    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly RequestStack $requestStack,
        #[Autowire(service: CollectionProvider::class)] private ProviderInterface $collectionProvider,
        #[Autowire(service: ItemProvider::class)] private ProviderInterface $itemProvider,
    )
    {}


    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {

        if ($operation instanceof CollectionOperationInterface) {
            return $this->CollectionHandler($operation,$uriVariables,$context);
        }

        return $this->GetHandler($operation,$uriVariables,$context);
    }

    private function CollectionHandler($operation,$uriVariables,$context)
    {
        $entities = $this->collectionProvider->provide($operation, $uriVariables, $context);
        assert($entities instanceof Paginator);
        $result = [];
        $arrayMakats = [];
        foreach ($entities as $entity) {
            $arrayMakats[] = $entity->getSku();
            $result[] = $entity;
        }

//            $this->FetchPriceOnline($arrayMakats, $result);
        $this->FetchPriceFromPriceList($result);

        return new TraversablePaginator(
            new \ArrayIterator($result),
            $entities->getCurrentPage(),
            $entities->getItemsPerPage(),
            $entities->getTotalItems()
        );
    }

    private function GetHandler($operation,$uriVariables,$context)
    {
        $entity = $this->itemProvider->provide($operation, $uriVariables, $context);
//        $this->FetchPriceFromPriceListPerProduct($entity);
        $this->FetchPriceFromPriceListPerProduct($entity);
        return $entity;
    }


    // ATTRIBUTE HANDLER

    private function attributeHandler()
    {
        //TODO HANDLE
    }

    // ONLINE
    private function FetchPriceOnline(array $makats, array $result)
    {
        $priceList = $this->requestStack->getCurrentRequest()->query->get('priceList');

        $response = (new ErpManager($this->httpClient))->GetPricesOnline($makats, $priceList);

        foreach ($response->prices as $itemRec){
            foreach ($result as &$subRec){
                if($subRec->getSku() === $itemRec->sku){
                    $subRec->setFinalPrice($itemRec->price);
                    break;
                }
            }
        }
        return $response;
    }

    private function FetchPriceFromPriceList(array $result)
    {
        $priceList = $this->requestStack->getCurrentRequest()->query->get('priceList');

        foreach ($result as &$itemRec){
            $finalPrice = 0;
            $discount = 5;
            if($itemRec->getBasePrice()){
                $finalPrice = $itemRec->getBasePrice();
            }

            $prices = $itemRec->getPriceListDetaileds();
            foreach ($prices as $subRec){
                if($subRec->getPriceListExId() === $priceList) {
                    $finalPrice = $subRec->getPrice();
                    $discount = $subRec->getDiscount();
                }
            }
            $itemRec->setStock(100);
            $itemRec->setDiscount($discount);
            $itemRec->setFinalPrice($finalPrice);
        }
    }

    private function FetchPriceOnlinePerProduct($entity)
    {
        $priceList = $this->requestStack->getCurrentRequest()->query->get('priceList');
        $response = (new ErpManager($this->httpClient))->GetPricesOnline([$entity->getSku()], $priceList);
        foreach ($response->prices as $itemRec){
                if($entity->getSku() === $itemRec->sku){
                    $entity->setFinalPrice($itemRec->price);
                    break;
                }
        }
        return $entity;
    }

    private function FetchPriceFromPriceListPerProduct($entity)
    {
        $priceList = $this->requestStack->getCurrentRequest()->query->get('priceList');
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
