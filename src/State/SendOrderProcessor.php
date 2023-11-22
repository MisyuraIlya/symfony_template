<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\ApiResource\Dto\CartDto;
use App\ApiResource\Dto\CartItemDto;
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
use Doctrine\DBAL\Driver\PDO\Exception;
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
        $this->ErpManager = new ErpManager($httpClient);
        $this->isMustDeliveryPrice = $_ENV['IS_MUST_DELIVERY_PRICE'] === "true";
        $this->minimumDeliveryPrice = (int) $_ENV['MINIMUM_DELIVERY_PRICE'] ;

        $this->isMaxOrderDiscount = (int) $_ENV['IS_MAX_ORDER_DISCOUNT'] === "true";
        $this->maxPriceForDiscount = (int) $_ENV['MAX_PRICE_FOR_DISCOUNT'] ;
        $this->discountPrecentForMaxPrice = (int) $_ENV['DISCOUNT_PRECENT_FOR_MAX_PRICE'] ;

    }

    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = [])
    {
//        try {
            $entity = $this->HandlerSaveOrder($data);
            return $entity;
//        } catch (\Exception $exception) {
//            $error = new Error();
//            $error->setDescription($exception->getMessage());
//            $error->setFunctionName('send order processor state');
//            $error->setCreatedAt(new \DateTimeImmutable());
//            $this->errorRepository->createError($error,true);
//            throw new \Exception($exception->getMessage());
//        }

    }

    private function HandlerSaveOrder(object $dto)
    {
        assert($dto instanceof SendOrder);
        $findUser = $this->userRepository->findOneByExtId($dto->userExtId);
        if(!$findUser) throw new \Exception('לא נמצא לקוח כזה');
        if($findUser->getIsBlocked()) throw new \Exception('לקוח חסום אנא פנה לתמיכה');
        if(!$dto->isBuyByCreditCard === null) throw new \Exception('שדה isButByCreditCard חובה אם זאת הזמנה עם כרטיס אשראי או הזמנה רגילה');
        if(!$dto->documentType === null) throw new \Exception('documentType שדה חובה order|quote|return');
        if(count($dto->products) == 0) throw new \Exception('לא בחר שום מוצר');
        if($this->isMustDeliveryPrice) {
            if(!$dto->deliveryPrice)  throw  new \Exception('לא נכנס מחיר משלוח');
        }
        $findAgent = $this->userRepository->findOneById($dto->getAgent());
        $history = $this->HandleHistory($dto, $findUser,$findAgent);
        foreach ($dto->products as $productRec){
            $this->HandleHistoryDetailed($productRec, $history);
        }

        $orderNumber = null;

        if($dto->agentId && $findAgent && $findAgent->isIsAllowOrder()){
//            $orderNumber = (new ErpManager($this->httpClient))->SendOrder($history->getId(), $this->historyRepository, $this->historyDetailedRepository);
            $orderNumber = '123123';
        }

        if(!$dto->agentId){
//            $orderNumber = (new ErpManager($this->httpClient))->SendOrder($history->getId(), $this->historyRepository, $this->historyDetailedRepository);
            $orderNumber = '123123';
        }
        sleep(5);
        if(!$orderNumber){
            if($findAgent && $dto->agentId && !$findAgent->isIsAllowOrder()){
                $res = new \stdClass();
                $res->orderNumber = $history->getId();
                $res->message = 'הזמנה נשמרה, ממתין לאישור מנהל';
                return $res;
            } else {
                $history->setOrderStatus(PurchaseStatus::FAILED);
                $history->setUpdatedAt(new \DateTimeImmutable());
                $this->historyRepository->save($history, true);
                $this->SaveError('שגיאה בשידור הזמנה', $history);
                throw  new \Exception('שגיאה בשידור הזמנה');
            }
        } else {
            $this->SaveOrderNumber($orderNumber, $history,$findAgent);
            $res = new \stdClass();
            $res->orderNumber = $orderNumber;
            $res->message = 'הזמנה שודרה בהצלחה';
            return $res;
        }

    }

    private function HandleHistory(object $dto, User $user, ?User $agent)
    {
            assert($dto instanceof  SendOrder);
            $newHistory = new History();
            $newHistory->setUser($user);
            $newHistory->setCreatedAt(new \DateTimeImmutable());
            $newHistory->setUpdatedAt(new \DateTimeImmutable());
            $newHistory->setDiscount($dto->discount);
            $newHistory->setDeliveryDate($dto->deliveryDate);
            $newHistory->setOrderComment($dto->comment);
            $newHistory->setDeliveryPrice($dto->deliveryPrice);
            $newHistory->setTotal($this->CalculateTotal($dto));
            $newHistory->setOrderStatus(PurchaseStatus::PENDING);
            $newHistory->setDocumentType($dto->documentType);
            if($agent){
                $newHistory->setAgent($agent);
                $newHistory->setIsSendErp($agent->isIsAllowOrder());
            } else {
                $newHistory->setIsSendErp(true);
            }
            $newHistory->setIsBuyByCreditCard($dto->isBuyByCreditCard);
            $historyId = $this->historyRepository->save($newHistory, true);
            return $historyId;

    }

    private function HandleHistoryDetailed(object $productsDto, History $history)
    {
        assert($productsDto instanceof CartItemDto);
        $findProduct = $this->productRepository->findOneBySku($productsDto->sku);

        if(!$findProduct) throw new \Error('לא נמצא פריט כזה');
        if(!$findProduct->isIsPublished()) throw new \Error( 'פריט חסום' . ' ' .  $findProduct->getTitle());

        $obj = new HistoryDetailed();
        $obj->setHistory($history);
        $obj->setProduct($findProduct);
        $obj->setHistory($history);
        $obj->setQuantity($productsDto->quantity);
        $obj->setTotal($this->CalculateTotalDetailed($productsDto));
        $obj->setSinglePrice($productsDto->price);
        $obj->setDiscount($productsDto->discount);
        $this->historyDetailedRepository->createHistoryDetailed($obj,true);

    }

    private function CalculateTotal($dto): float
    {
        $total = 0;
        assert($dto instanceof SendOrder);
//        foreach ($dto->products as $itemRec){
//            $total += $itemRec->total;
//        }
//
//        $tax = $total * 0.17;
//        $total += $tax;
//        if($dto->getDiscount()){
//            $total -= $total * ($dto->getDiscount() / 100);
//        }
//
//        if($this->isMustDeliveryPrice){
//            $total += $this->minimumDeliveryPrice;
//        }
//
//        if($this->isMaxOrderDiscount && $total >= $this->maxPriceForDiscount){
//            $total -= $total * ($this->discountPrecentForMaxPrice / 100);
//        }
//
//
//        if( (int) $dto->getTotal() != (int) $total) {
//            throw new \Exception('הסכום לא תואם התקבל ' . $dto->getTotal(). ' במוקם ' . $total);
//        }

        return $dto->total;
    }

    private function CalculateTotalDetailed($productDto): float
    {
        assert($productDto instanceof CartItemDto);
        $total = $productDto->quantity * $productDto->price;
        if($productDto->discount){
            $total -= $total * ($productDto->discount / 100);
        }

        if( (int)$productDto->total !=  (int)$total){
            throw new \Exception('סה״כ המחיר של' . $productDto->sku . 'לא תואם לסכום שהתקבל בשרת');
        }

        return $total;
    }

    private function SaveOrderNumber(string $orderNumber, History $history, ?User $agent = null)
    {
        $history->setOrderExtId($orderNumber);
        $history->setIsSendErp(true);
        $history->setAgentApproved($agent);
        $history->setSendErpAt(new \DateTimeImmutable());
        $history->setOrderStatus(PurchaseStatus::PAID);
        $history->setUpdatedAt(new \DateTimeImmutable());
        $this->historyRepository->save($history, true);
    }

    private function SaveError($message, History $history){

        $error = new Error();
        $error->setCreatedAt(new \DateTimeImmutable());
        $error->setDescription($message);
        $error->setFunctionName('Send Order');
        $this->errorRepository->createError($error,true);
        $history->setError($error);
        $history->setUpdatedAt(new \DateTimeImmutable());
        $this->historyRepository->save($history,true);
    }
}
