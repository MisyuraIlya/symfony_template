<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\ApiResource\Dto\CartDto;
use App\ApiResource\SendOrder;
use App\Entity\Error;
use App\Entity\History;
use App\Entity\HistoryDetailed;
use App\Entity\User;
use App\Enum\DocumentTypeHistory;
use App\Enum\PurchaseStatus;
use App\Erp\ErpManager;
use App\Repository\ErrorRepository;
use App\Repository\HistoryDetailedRepository;
use App\Repository\HistoryRepository;
use App\Repository\ProductRepository;
use App\Repository\UserRepository;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class SendOrderProcessor implements ProcessorInterface
{
    public function __construct(
        private HistoryRepository $historyRepository,
        private HistoryDetailedRepository $historyDetailedRepository,
        private UserRepository $userRepository,
        private ProductRepository $productRepository,
        private HttpClientInterface $httpClient,
        private readonly ErrorRepository $errorRepository,
    )
    {
    }

    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = [])
    {
        try {
            $entity = $this->HandlerSaveOrder($data);
            return $entity;
        } catch (\Exception $exception) {
            $error = new Error();
            $error->setDescription($exception->getMessage());
            $error->setFunctionName('send order processor state');
            $this->errorRepository->createError($error,true);
            $obj =  new \stdClass();
            $obj->error = $exception->getMessage();
            return $obj;
        }

    }

    private function HandlerSaveOrder(object $dto)
    {
        assert($dto instanceof SendOrder);
        $findUser = $this->userRepository->findOneByExtId($dto->userExtId);
        if(!$findUser) throw new \Error('לא נמצא לקוח כזה');
        if($findUser->getIsBlocked()) throw new \Error('לקוח חסום אנא פנה לתמיכה');

        $history = $this->HandleHistory($dto, $findUser);
        foreach ($dto->products as $productRec){
            $this->HandleHistoryDetailed($productRec, $history);
        }

        try {
            $orderNumber = (new ErpManager($this->httpClient))->SendOrder($history->getId(), $this->historyRepository, $this->historyDetailedRepository);
//        $orderNumber = '123123';
            sleep(5);
            $this->SaveOrderNumber($orderNumber, $history);

            $res = new \stdClass();
            $res->orderNumber = $orderNumber;
            return $res;
        } catch (\Exception $e) {
            $this->SaveError($e->getMessage(), $history);
        }

    }

    private function HandleHistory(object $dto, User $user)
    {
        $newHistory = new History();
        $newHistory->setUser($user);
        $newHistory->setCreatedAt($dto->createdAt);
        $newHistory->setUpdatedAt($dto->createdAt);
        $newHistory->setDiscount($dto->discount);
        $newHistory->setDeliveryDate($dto->deliveryDate);
        $newHistory->setOrderComment($dto->comment);
        $newHistory->setDeliveryPrice($dto->deliveryPrice);
        $newHistory->setTotal($this->CalculateTotal($dto));
        $newHistory->setOrderStatus(PurchaseStatus::PENDING);
        $newHistory->setDocumentType(DocumentTypeHistory::ORDER);
        $historyId = $this->historyRepository->createHistory($newHistory, true);
        return $historyId;
    }

    private function HandleHistoryDetailed(object $productsDto, History $history)
    {
        assert($productsDto instanceof CartDto);
        $findProduct = $this->productRepository->findOneBySku($productsDto->sku);
        if(!$findProduct) throw new \Error('לא נמצא פריט כזה');
        if(!$findProduct->isIsPublished()) throw new \Error( 'פריט חסום' . ' ' .  $findProduct->getTitle());

        $obj = new HistoryDetailed();
        $obj->setHistory($history);
        $obj->setProduct($findProduct);
        $obj->setHistory($history);
        $obj->setQuantity($productsDto->quantity);
        $obj->setTotal($productsDto->quantity * $productsDto->price);
        $obj->setSinglePrice($productsDto->price);
        $obj->setDiscount($productsDto->discount);
        $this->historyDetailedRepository->createHistoryDetailed($obj,true);

    }

    private function CalculateTotal($dto): int
    {
        $total = 0;
        assert($dto instanceof SendOrder);
        foreach ($dto->products as $itemRec){
            $total += $itemRec->price * $itemRec->quantity;
        }

        return $total;
    }

    private function SaveOrderNumber(string $orderNumber, History $history)
    {
        $history->setOrderExtId($orderNumber);
        $history->setOrderStatus(PurchaseStatus::PAID);
        $history->setUpdatedAt(new \DateTimeImmutable());
        $this->historyRepository->createHistory($history, true);
    }

    private function SaveError($message, History $history){

        $error = new Error();
        $error->setDescription($message);
        $error->setFunctionName('Send Order');
        $this->errorRepository->createError($error,true);
        $history->setError($error);
        $history->setUpdatedAt(new \DateTimeImmutable());
        $this->historyRepository->createHistory($history,true);
    }
}
