<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\Dto\CartItemDto;
use App\ApiResource\Dto\CartsDto;
use App\ApiResource\RestoreCart;
use App\Entity\User;
use App\Erp\ErpManager;
use App\Repository\HistoryRepository;
use App\Repository\ProductRepository;
use App\Repository\UserRepository;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class RestoreCartStateProvider implements ProviderInterface
{
    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly HistoryRepository $historyRepository,
        private readonly UserRepository $userRepository,
        private readonly ProductRepository $productRepository,
    )
    {
        $this->ErpManager = new ErpManager($this->httpClient);
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        $documentType = $uriVariables['documentType'];
        $orderNumber = $uriVariables['orderNumber'];
        $userExtId = $uriVariables['userExtId'];

        $user = $this->userRepository->findOneByExtId($userExtId);

        if($documentType === 'history' && !empty($user)) {
            $response = $this->handleHistory($orderNumber,$user);

        }

        if($documentType === 'online' && !empty($user)) {
            $response = $this->handleOnline($orderNumber,$user);
        }
        return $response->cart;
    }

    private function handleOnline($orderNumber, User $user): CartsDto
    {
        $result = new CartsDto();
        $data = $this->ErpManager->GetDocumentsItem($orderNumber);
        $skus = [];
        foreach ($data->products as $itemRec){
            $skus[] = $itemRec->sku;
            $product = $this->productRepository->findOneBySku($itemRec->sku);
            if($product && $product->isIsPublished()){
                $obj = new RestoreCart();
                $obj->total = $product->getBasePrice() * $itemRec->quantity;
                $obj->sku = $product->getSku();
                $obj->discount = 0;
                $obj->stock = 0;
                $obj->price = $product->getBasePrice();
                $obj->quantity = $itemRec->quantity;
                $product->setFinalPrice($product->getBasePrice());
                $obj->product = $product;
                $result->cart[] = $obj;
            }
        }



        if($user->getPriceList()){
            $prices = $this->ErpManager->GetPricesOnline($skus, $user->getPriceList()->getExtId());
            foreach ($result->cart as $itemRec){
                foreach ($prices->prices as $priceRec){
                    if($itemRec->sku === $priceRec->sku){
                        $itemRec->price = $priceRec->price;
                        $itemRec->total = $priceRec->price * $itemRec->quantity;
                        if($priceRec->discountPrecent){
                            $itemRec->discount = $priceRec->discountPrecent;
                        } else {
                            $itemRec->discount = 0;
                        }
                    }
                }
            }
        }

        $inStockProducts = new CartsDto();

        $stocks = $this->ErpManager->GetStocksOnline($skus);
        foreach ($result->cart as $itemRec){
            foreach ($stocks->stocks as $stockRec){
                if($itemRec->sku === $stockRec->sku){
                    if($stockRec->stock > 0){
                        $itemRec->stock = $stockRec->stock;
                        $inStockProducts->cart[] = $itemRec;

                    }
                }
            }
        }

        return $inStockProducts;
    }

    private function handleHistory($orderNumber, User $user): CartsDto
    {
        $result = new CartsDto();
        $data = $this->historyRepository->findOneById($orderNumber);

        $skus = [];
        foreach ($data->getHistoryDetaileds() as $itemRec){
            $skus[] = $itemRec->getProduct()->getSku();
            $product = $this->productRepository->findOneBySku($itemRec->getProduct()->getSku());
            if($product && $product->isIsPublished()){
                $obj = new RestoreCart();
                $obj->total = $product->getBasePrice() * $itemRec->getQuantity();
                $obj->sku = $product->getSku();
                $obj->discount = 0;
                $obj->stock = 0;
                $obj->price = $product->getBasePrice();
                $obj->quantity = $itemRec->getQuantity();
                $product->setFinalPrice($product->getBasePrice());
                $obj->product = $product;
                $result->cart[] = $obj;
            }

        }

        if($user->getPriceList()){
            $prices = $this->ErpManager->GetPricesOnline($skus, $user->getPriceList()->getExtId());
            foreach ($result->cart as $itemRec){
                foreach ($prices->prices as $priceRec){
                    if($itemRec->getSku() === $priceRec->sku){
                        $itemRec->setPrice($priceRec->price);
                        if($priceRec->discountPrecent){
                            $itemRec->setDiscount($priceRec->discountPrecent);
                        } else {
                            $itemRec->setDiscount(0);
                        }
                    }
                }
            }
        }

        $inStockProducts = new CartsDto();

        $stocks = $this->ErpManager->GetStocksOnline($skus);
        foreach ($result->cart as $itemRec){
            foreach ($stocks->stocks as $stockRec){
                if($itemRec->sku === $stockRec->sku){
                    if($stockRec->stock > 0){
                        $itemRec->stock =$stockRec->stock;
                        $inStockProducts->cart[] = $itemRec;
                    }
                }
            }
        }
        // dd($inStockProducts);

        return $inStockProducts ;

    }


}
