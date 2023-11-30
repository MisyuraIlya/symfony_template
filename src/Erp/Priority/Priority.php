<?php

namespace App\Erp\Priority;

use App\Entity\History;
use App\Entity\HistoryDetailed;
use App\Entity\PackMain;
use App\Entity\User;
use App\Enum\DocumentsType;
use App\Enum\DocumentTypeHistory;
use App\Erp\Dto\AttributeMainDto;
use App\Erp\Dto\AttributeSubDto;
use App\Erp\Dto\CartessetDto;
use App\Erp\Dto\CartessetLineDto;
use App\Erp\Dto\CategoriesDto;
use App\Erp\Dto\CategoryDto;
use App\Erp\Dto\DocumentItemsDto;
use App\Erp\Dto\DocumentsDto;
use App\Erp\Dto\MigvanDto;
use App\Erp\Dto\MigvansDto;
use App\Erp\Dto\PackMainDto;
use App\Erp\Dto\PackProductDto;
use App\Erp\Dto\PacksMainDto;
use App\Erp\Dto\PacksProductDto;
use App\Erp\Dto\PriceDto;
use App\Erp\Dto\PriceListDetailedDto;
use App\Erp\Dto\PriceListDto;
use App\Erp\Dto\PriceListsDetailedDto;
use App\Erp\Dto\PriceListsDto;
use App\Erp\Dto\PriceListsUserDto;
use App\Erp\Dto\PriceListUserDto;
use App\Erp\Dto\PricesDto;
use App\Erp\Dto\ProductDto;
use App\Erp\Dto\ProductsDto;
use App\Erp\Dto\PurchaseHistory;
use App\Erp\Dto\PurchaseHistoryItem;
use App\Erp\Dto\StockDto;
use App\Erp\Dto\StocksDto;
use App\Erp\Dto\UserDto;
use App\Erp\Dto\UsersDto;
use App\Erp\ErpInterface;
use App\Erp\Enums\PriorityEnums;
use App\Repository\HistoryDetailedRepository;
use App\Repository\HistoryRepository;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Priority implements ErpInterface
{
    private string $username;
    private string $password;
    private string $url;

    public function __construct(string $url, string $username, string $password, HttpClientInterface $httpClient)
    {
        $this->username = $username;
        $this->password = $password;
        $this->url = $url;
        $this->httpClient = $httpClient;
    }

    public function GetRequest($query)
    {
        $response = $this->httpClient->request(
            'GET',
            $this->url.$query,
            [
                'auth_basic' => [$this->username, $this->password],
                'http_version' => '1.1',
                'timeout' => 600
            ]
        );
        $statusCode = $response->getStatusCode();
        $contentType = $response->getHeaders()['content-type'][0];
        $content = $response->getContent();
        $content = $response->toArray();

        return $content['value'];
    }
    public function PostRequest(object $obj, string $table)
    {
//        $response = $this->httpClient->request(
//            'POST',
//            $this->url.$table,
//            [
//                'auth_basic' => [$this->username, $this->password],
//                'timeout' => 60,
//                'body' => $obj
//            ]
//        );
//
//        $statusCode = $response->getStatusCode();
//        $contentType = $response->getHeaders()['content-type'][0];
//        $content = $response->getContent();
//        $content = $response->toArray();
//        return $content['value'];
        return '123';
    }

    public function GetPricesOnline(?array $skus, ?array $priceList):PricesDto
    {
        $result = new PricesDto();
        $queryFilter = $this->ImplodeQueryByMakats($skus);
        $queryFilterPriceList = $this->ImplodeQueryByPlname($priceList);
        $endpoint2 = "/PRICELIST";
        $queryParameters2 = [
            '$filter' => $queryFilterPriceList,
            '$expand' => 'PARTPRICE2_SUBFORM($select=PARTNAME,QUANT,UNITNAME,DVATPRICE,PRICE,PERCENT,DPRICE,VATPRICE,BASEPRICE;$filter='. $queryFilter .')',
        ];
        $queryString2 = http_build_query($queryParameters2);
        $urlQuery2 = $endpoint2 . '?' . $queryString2;
        $response = $this->GetRequest($urlQuery2);
        foreach ($response as $priceRec) {
            foreach ($priceRec['PARTPRICE2_SUBFORM'] as $listRec) {
                $dto = new PriceDto();
                $dto->sku = $listRec['PARTNAME'];
                $dto->basePrice = $listRec['BASEPRICE'];
                $dto->price = $listRec['PRICE'];
                $dto->priceAfterDiscount = $listRec['DPRICE'];
                $dto->vatPrice = $listRec['VATPRICE'];
                $dto->vatAfterDiscount = $listRec['DVATPRICE'];
                $dto->discountPrecent = $listRec['PERCENT'];
                $result->prices[] = $dto;
            }
        }
        return $result;
    }
    public function GetStocksOnline(?array $skus):StocksDto
    {
        $queryFilter = $this->ImplodeQueryByMakats($skus);

        $endpoint = "/LOGPART";
        $queryParameters = [
            '$select' => "PARTNAME",
            '$filter' => "$queryFilter",
            '$expand' => 'LOGCOUNTERS_SUBFORM',
        ];
        $queryString = http_build_query($queryParameters);
        $urlQuery = $endpoint . '?' . $queryString;
        $response = $this->GetRequest($urlQuery);
        $stocks = new StocksDto();
        foreach ($response as $itemRec) {
            foreach ($itemRec['LOGCOUNTERS_SUBFORM'] as $subRec){
                $dto = new StockDto();
                $dto->sku = $itemRec['PARTNAME'];
                $dto->stock = $subRec['BALANCE'];
                $stocks->stocks[] = $dto;
            }
        }

        return $stocks;
    }
    public function GetOnlineUser(string $userExtId):User
    {

    }
    public function GetMigvanOnline(string $userExtId):MigvansDto
    {
        $endpoint = "/CUSTOMERS";
        $queryParameters = [
            '$select' => "CUSTNAME",
            '$filter' => "CUSTNAME eq '$userExtId'",
            '$expand' => 'CUSTPART_SUBFORM',
        ];
        $queryString = http_build_query($queryParameters);
        $urlQuery = $endpoint . '?' . $queryString;
        $response = $this->GetRequest($urlQuery);

        $result = new MigvansDto();
        foreach ($response as $itemRec) {
            foreach ($itemRec['CUSTPART_SUBFORM'] as $subRec){
                $result->migvans[] = $subRec['PARTNAME'];
            }
        }
        return $result;
    }
    public function GetDocuments(string $userExId, \DateTimeImmutable $dateFrom, \DateTimeImmutable $dateTo, string $documentType , ?int $limit = 10): DocumentsDto
    {
        $order = [];
        $offers = [];
        $documents = [];
        $aiInvoice = [];
        $ciInvoice = [];
        $returnDocs = [];
        $enums = DocumentsType::getAllDetails();
        if($enums['ORDERS']['ENGLISH'] === $documentType){
            $order = (new PriorityDocuments($this->url, $this->username, $this->password, $this->httpClient))->GetOrders($userExId,$dateFrom, $dateTo);
        } else if ($enums['PRICE_OFFER']['ENGLISH'] === $documentType) {
            $offers = (new PriorityDocuments($this->url, $this->username, $this->password, $this->httpClient))->GetPriceOffer($userExId,$dateFrom, $dateTo);
        } else if($enums['DELIVERY_ORDER']['ENGLISH'] === $documentType) {
            $documents = (new PriorityDocuments($this->url, $this->username, $this->password, $this->httpClient))->GetDeliveryOrder($userExId,$dateFrom, $dateTo);
        } else if($enums['AI_INVOICE']['ENGLISH'] === $documentType) {
            $aiInvoice = (new PriorityDocuments($this->url, $this->username, $this->password, $this->httpClient))->GetAiInvoice($userExId,$dateFrom, $dateTo);
        } else if($enums['CI_INVOICE']['ENGLISH'] === $documentType) {
            $ciInvoice = (new PriorityDocuments($this->url, $this->username, $this->password, $this->httpClient))->GetCiInvoice($userExId,$dateFrom, $dateTo);
        } else if($enums['RETURN_ORDERS']['ENGLISH'] === $documentType) {
            $returnDocs = (new PriorityDocuments($this->url, $this->username, $this->password, $this->httpClient))->GetReturnDocs($userExId,$dateFrom, $dateTo);
        } else if($enums['ALL']['ENGLISH'] === $documentType) {
            $order = (new PriorityDocuments($this->url, $this->username, $this->password, $this->httpClient))->GetOrders($userExId,$dateFrom, $dateTo);
            $offers = (new PriorityDocuments($this->url, $this->username, $this->password, $this->httpClient))->GetPriceOffer($userExId,$dateFrom, $dateTo);
            $documents = (new PriorityDocuments($this->url, $this->username, $this->password, $this->httpClient))->GetDeliveryOrder($userExId,$dateFrom, $dateTo);
            $aiInvoice = (new PriorityDocuments($this->url, $this->username, $this->password, $this->httpClient))->GetAiInvoice($userExId,$dateFrom, $dateTo);
            $ciInvoice = (new PriorityDocuments($this->url, $this->username, $this->password, $this->httpClient))->GetCiInvoice($userExId,$dateFrom, $dateTo);
            $returnDocs = (new PriorityDocuments($this->url, $this->username, $this->password, $this->httpClient))->GetReturnDocs($userExId,$dateFrom, $dateTo);
        }

        $mergedArray = array_merge($order, $offers, $documents, $aiInvoice, $ciInvoice, $returnDocs);
        $obj = new DocumentsDto();
        $obj->documents = $mergedArray;
        return $obj;
    }
    public function GetDocumentsItem(string $documentNumber): DocumentItemsDto
    {
        $orders = (new PriorityDocuments($this->url, $this->username, $this->password, $this->httpClient))->GetOrderItems($documentNumber);
        $offers = (new PriorityDocuments($this->url, $this->username, $this->password, $this->httpClient))->GetPriceOfferItem($documentNumber);
        $documentOrder = (new PriorityDocuments($this->url, $this->username, $this->password, $this->httpClient))->GetDeliveryOrderItem($documentNumber);
        $aiInvoice = (new PriorityDocuments($this->url, $this->username, $this->password, $this->httpClient))->GetAiInvoiceItem($documentNumber);
        $ciInvoice = (new PriorityDocuments($this->url, $this->username, $this->password, $this->httpClient))->GetCiInvoiceItem($documentNumber);
        $returnDocItem = (new PriorityDocuments($this->url, $this->username, $this->password, $this->httpClient))->GetReturnDocsItem($documentNumber);
        if (!empty($orders->products)) {
            return $orders;
        } elseif (!empty($offers->products)) {
            return $offers;
        } elseif (!empty($documentOrder->products)) {
            return $documentOrder;
        } elseif (!empty($aiInvoice->products)) {
            return $aiInvoice;
        } elseif (!empty($ciInvoice->products)) {
            return $ciInvoice;
        } elseif (!empty($returnDocItem->products)) {
            return $returnDocItem;
        } else {
            return new DocumentItemsDto();
        }
    }
    public function GetCartesset(string $userExId, \DateTimeImmutable $dateFrom, \DateTimeImmutable $dateTo): CartessetDto
    {
        $endpoint = "/ACCOUNTS_RECEIVABLE";
        $dateFrom = $dateFrom->format('Y-m-d\TH:i:s.u\Z');
        $dateTo = $dateTo->format('Y-m-d\TH:i:s.u\Z');
        $queryParameters = [
            '$filter' => "ACCNAME eq '$userExId'",
            '$expand' => 'ACCFNCITEMS2_SUBFORM($filter=BALDATE ge ' . $dateFrom . ' and BALDATE le ' . $dateTo . ')'
        ];
        $queryString = http_build_query($queryParameters);
        $urlQuery = $endpoint . '?' . $queryString;
        $response = $this->GetRequest($urlQuery);

        $result = new CartessetDto();
        foreach ($response as $itemRec) {
            foreach ($itemRec['ACCFNCITEMS2_SUBFORM'] as $subRec){
                $obj = new CartessetLineDto();
                $obj->TransID = $subRec['FNCTRANS'] ;
                $obj->ID = $subRec['FNCNUM'];
                $obj->TransType = $subRec['DETAILS'];
                $obj->ValueDate = $subRec['CURDATE'];
                $obj->DueDate = $subRec['FNCDATE'];
                $obj->Referance = $subRec['FNCIREF1'];
                $obj->Ref2 = $subRec['FNCIREF2'];
                $obj->Description = $subRec['DETAILS'];
                $obj->suF = $subRec['DEBIT'];
                $obj->Balance = $subRec['BAL'];
                $obj->Show = true;
                $result->lines[] = $obj;
            }
        }

        return $result;

    }
    public function PurchaseHistoryByUserAndSku(string $userExtId, string $sku): PurchaseHistory
    {
        $endpoint = "/ORDERS";
        $queryParameters = [
            '$filter' => "CUSTNAME eq '$userExtId'",
            '$select' => "ORDNAME,CURDATE",
            '$expand' => 'ORDERITEMS_SUBFORM($filter=PARTNAME eq ' . "'" . $sku . "'".')'
        ];
        $queryString = http_build_query($queryParameters);
        $urlQuery = $endpoint . '?' . $queryString;
        $response = $this->GetRequest($urlQuery);
        $result = new PurchaseHistory();
        foreach ($response as $itemRec) {
            foreach ($itemRec['ORDERITEMS_SUBFORM'] as $subRec){
                $obj = new PurchaseHistoryItem();
                $obj->documentNumber = $itemRec['ORDNAME'];
                $obj->date = $itemRec['CURDATE'];
                $obj->quantity = $subRec['TQUANT'];
                $obj->price = $subRec['PRICE'];
                $obj->vatPrice = $subRec['VPRICE'];
                $obj->discount = $subRec['PERCENT'];
                $obj->totalPrice = $subRec['QPRICE'];
                $obj->vatTotal = $subRec['VATPRICE'];
                $result->items[] = $obj;
            }
        }
        return $result;
    }


    public function SendOrder(int $historyId, HistoryRepository $historyRepository, HistoryDetailedRepository $historyDetailedRepository): string
    {
        $order = $historyRepository->findOneById($historyId);
        $findDetailds = $historyDetailedRepository->findOneByHistoryId($historyId);
        if(!$order) throw new \Exception('לא נמצא הזמנה');

        if($order->getDocumentType() === DocumentTypeHistory::ORDER) {
            $response = $this->SendOrderTemplate($order,$findDetailds);
        } elseif ($order->getDocumentType() === DocumentTypeHistory::QUOTE) {
            $response = $this->SendQuoteTemplate($order,$findDetailds);
        } elseif ($order->getDocumentType() === DocumentTypeHistory::RETURN) {
            $response = $this->SendReturnTemplate($order,$findDetailds);
        } else {
            throw new \Exception('לא נמצא מסמך כזה');
        }

        return $response;
    }
    private function SendOrderTemplate(History $order, array $historyDetailed)
    {
        $obj = new \stdClass();
        $obj->CUSTNAME = $order->getUser()->getExtId();
        $obj->DUEDATE = $order->getCreatedAt()->format('Y-m-d\TH:i:sP');
        $lines = new \stdClass();
        $lines->lines = [];
        foreach ($historyDetailed as $itemRec){
            assert($itemRec instanceof HistoryDetailed);
            $objLine = new \stdClass();
            $objLine->PARTNAME = $itemRec->getProduct()->getSku();
            $objLine->TQUANT = $itemRec->getQuantity();
            $objLine->PRICE = $itemRec->getSinglePrice();
            $lines->lines[] = $objLine;
        }

        $obj->ORDERITEMS_SUBFORM = $lines->lines;

        $response = $this->PostRequest($obj, '/' . 'ORDERS');
        if(isset($response->DOCNO) && $response->ORDNAME) {
            return $response->ORDNAME;
        } else {
            throw new \Exception('הזמנה לא שודרה');
        }
    }

    private function SendQuoteTemplate(History $order, array $historyDetailed)
    {
        $obj = new \stdClass();
        $obj->CUSTNAME = $order->getUser()->getExtId();
        $obj->PDATE = $order->getCreatedAt()->format('Y-m-d\TH:i:sP');
        $lines = new \stdClass();
        $lines->lines = [];
        foreach ($historyDetailed as $itemRec){
            assert($itemRec instanceof HistoryDetailed);
            $objLine = new \stdClass();
            $objLine->PARTNAME = $itemRec->getProduct()->getSku();
            $objLine->TQUANT = $itemRec->getQuantity();
            $objLine->PRICE = $itemRec->getSinglePrice();
            $lines->lines[] = $objLine;
        }

        $obj->CPROFITEMS_SUBFORM = $lines->lines;

        $response = $this->PostRequest($obj, '/' . 'CPROF');
        if(isset($response->CPROFNUM) && $response->CPROFNUM) {
            return $response->CPROFNUM;
        } else {
            throw new \Exception('הזמנה לא שודרה');
        }
    }

    private function SendReturnTemplate(History $order, array $historyDetailed)
    {
        $obj = new \stdClass();
        $obj->CUSTNAME = $order->getUser()->getExtId();
        $lines = new \stdClass();
        $lines->lines = [];
        foreach ($historyDetailed as $itemRec){
            $objLine = new \stdClass();
            $objLine->PARTNAME = $itemRec->sku;
            $objLine->TQUANT = $itemRec->quantity;
            $objLine->PRICE = $itemRec->price;
            $lines->lines[] = $objLine;
        }

        $obj->TRANSORDER_N_SUBFORM = $lines->lines;

        $response = $this->PostRequest($obj, '/' . 'DOCUMENTS_N');
        if(isset($response->DOCNO) && $response->DOCNO) {
            return $response->DOCNO;
        } else {
            throw new \Exception('הזמנה לא שודרה');
        }
    }


    /** FOR CRON */
    public function GetProducts(?int $pageSize, ?int $skip): ProductsDto
    {
        $endpoint = "/LOGPART";
        if($pageSize) {
            $queryExtras = [
                '$select' => "STATDES,SHOWINWEB,WSPLPRICE,FTCODE,FTNAME,FAMILYNAME,FAMILYDES,INVFLAG,BASEPLPRICE,PARTNAME,CONV,BARCODE,PARTDES,ELEL_HUMANE,ELEL_VETRINARY,ELIT_PHARMACIES,ELIT_MEDICALCENTER,ELIT_ISHOSPITAL,ELIT_DRUGNOTINBASKET,SPEC18,PRICE,EPARTDES,UNSPSCDES,SHOWINWEB,ELMM_HELTHEMINSITE,ELMM_HIPERCON,EXTFILENAME,MPARTNAME",
                '$expand' => "PARTARC_SUBFORM",
                '$top' => $pageSize,
                '$skip' => $skip,
            ];
        } else {
            $queryExtras = [
                '$select' => "STATDES,SHOWINWEB,FAMILYNAME,FTCODE,FTNAME,FAMILYDES,INVFLAG,BASEPLPRICE,PARTNAME,CONV,BARCODE,PARTDES,ELEL_HUMANE,ELEL_VETRINARY,ELIT_PHARMACIES,ELIT_MEDICALCENTER,ELIT_ISHOSPITAL,ELIT_DRUGNOTINBASKET,SPEC18,PRICE,EPARTDES,UNSPSCDES,SHOWINWEB,ELMM_HELTHEMINSITE,ELMM_HIPERCON,EXTFILENAME,MPARTNAME",
                '$expand' => "PARTARC_SUBFORM",
            ];
        }

        $queryString = http_build_query($queryExtras);
        $urlQuery = $endpoint . '?' . $queryString;

        $dtoRes = new ProductsDto();
        $response = $this->GetRequest($urlQuery);

        foreach ($response as $itemRec){
            $dto = new ProductDto();
            $dto->sku = $itemRec['PARTNAME'];
            $dto->categoryId = $itemRec['FTCODE'];
            $dto->categoryDescription = $itemRec['FTNAME'];
            $dto->barcode = $itemRec['BARCODE'];
            $dto->title = $itemRec['PARTDES'];
            $dto->packQuantity = $itemRec['CONV'];
            if($itemRec['STATDES'] === 'פעיל'){
                $dto->status = true;
            } else {
                $dto->status = false;
            }
//            $dto->Extra1 = $itemRec['SPEC1'];
//            $dto->Extra2 = $itemRec['SPEC2'];
//            $dto->Extra3 = $itemRec['SPEC3'];
//            $dto->Extra4 = $itemRec['SPEC4'];
//            $dto->Extra5 = $itemRec['SPEC5'];
//            $dto->Extra6 = $itemRec['SPEC6'];
//            $dto->Extra7 = $itemRec['SPEC7'];
//            $dto->Extra8 = $itemRec['SPEC8'];
//            $dto->Extra9 = $itemRec['SPEC9'];
//            $dto->Extra10 = $itemRec['SPEC10'];
//            $dto->Extra11 = $itemRec['SPEC11'];
//            $dto->Extra12 = $itemRec['SPEC12'];
//            $dto->Extra13 = $itemRec['SPEC13'];
//            $dto->Extra14 = $itemRec['SPEC14'];
//            $dto->Extra15 = $itemRec['SPEC15'];
//            $dto->Extra16 = $itemRec['SPEC16'];
//            $dto->Extra17 = $itemRec['SPEC17'];
//            $dto->Extra18 = $itemRec['SPEC18'];
//            $dto->Extra19 = $itemRec['SPEC19'];
//            $dto->Extra20 = $itemRec['SPEC20'];
//            $dto->baseprice = $itemRec['BASEPLPRICE'];
            $dto->baseprice = $itemRec['WSPLPRICE']; //CUSTOM MEDI
            if(isset($itemRec['PARTTEXT_SUBFORM']['TEXT'])) {
                $dto->innerHtml = $itemRec['PARTTEXT_SUBFORM']['TEXT'];
            } else {
                $dto->innerHtml = null;
            }
            $dto->intevntory_managed = $itemRec['INVFLAG'] === 'Y' ? true : false;
            $dtoRes->products[] = $dto;
        }
        return $dtoRes;
    }
    public function GetSubProducts(): ProductsDto
    {
        $endpoint = "/LOGPART";
        $queryExtras = [
            '$expand' => "PARTARC_SUBFORM"
        ];
        $queryString = http_build_query($queryExtras);
        $urlQuery = $endpoint . '?' . $queryString;

        $dtoRes = new ProductsDto();
        $response = $this->GetRequest($urlQuery);
        foreach ($response as $itemRec){

            foreach ($itemRec['PARTARC_SUBFORM'] as $subRec){
                $dto = new ProductDto();
                $dto->sku = $subRec['SONNAME'];
                $dto->title = $subRec['SONDES'];
                $dto->parent = $itemRec['PARTNAME'];
                $dtoRes->products[] = $dto;
            }
        }
        return $dtoRes;
    }
    public function GetUsers(): UsersDto
    {
//        $response = $this->GetRequest('/CUSTOMERS?$expand=CUSTDISCOUNT_SUBFORM');
        $response = $this->GetRequest('/PHONEBOOK');
        $usersDto = new UsersDto();

        foreach ($response as $userRec) {
            if ($userRec['INACTIVEFLAG'] === null) {
                $userDto = new UserDto();
                $userDto->userExId = $userRec['CUSTNAME'];
                $userDto->userDescription = $userRec['CUSTDES'];
                $userDto->name = $userRec['NAME'];
                $userDto->isBlocked = $userRec['INACTIVEFLAG'] === 'Y' ? true : false;
                $userDto->phone = $userRec['PHONE'];
                $usersDto->users[] = $userDto;
            }
        }

        return $usersDto;

    }
    public function GetSubUsers(): UsersDto
    {
        $response = $this->GetRequest('/CUSTOMERS?$expand=CUSTPERSONNEL_SUBFORM,CUSTDISCOUNT_SUBFORM,CUSTPLIST_SUBFORM');
        $usersDto = new UsersDto();

        foreach ($response as $userRec) {
            if ($userRec['INACTIVEFLAG'] === null) {
                $globalDiscount = null;
                $priceList = null;
                foreach ($userRec['CUSTDISCOUNT_SUBFORM'] as $discountRec){
                    $expiryDate = new \DateTime($discountRec['EXPIRYDATE']);
                    $currentDate = new \DateTime();
                    if($expiryDate > $currentDate){
                        $globalDiscount = $discountRec['DISCOUNT'];
                    }
                }

                foreach ($userRec['CUSTPLIST_SUBFORM'] as $priceRec) {
                    $expiryDate = new \DateTime($priceRec['PLDATE']);
                    $currentDate = new \DateTime();
                    if($expiryDate > $currentDate){
                        $priceList = $priceRec['PLNAME'];
                    }
                }

                foreach ($userRec['CUSTPERSONNEL_SUBFORM'] as $subUsersRec) {
                    $userDto = new UserDto();
                    $userDto->userExId = $userRec['CUSTNAME'];
                    $userDto->userDescription = $userRec['CUSTDES'];
                    $userDto->name = $subUsersRec['NAME'];
                    $userDto->telephone = $subUsersRec['PHONENUM'];
                    $userDto->maxObligo = $userRec['MAX_OBLIGO'];
                    $userDto->maxCredit = $userRec['MAX_CREDIT'];
                    $userDto->phone = $subUsersRec['CELLPHONE'];
                    $userDto->address = $userRec['ADDRESS'];
                    $userDto->town = $userRec['STATE'];
                    $userDto->isBlocked = $userRec['INACTIVEFLAG'] === 'Y' ? false : true;
                    $userDto->globalDiscount = $globalDiscount;
                    $userDto->priceList = $priceList;
                    $usersDto->users[] = $userDto;

                }
            }
        }

        return $usersDto;
    }
    public function GetMigvan(): MigvansDto
    {
        $endpoint = "/CUSTOMERS";
        $queryParameters = [
            '$select' => 'CUSTNAME',
            '$expand' => 'CUSTPART_SUBFORM($select=PARTNAME)',
        ];
        $queryString = http_build_query($queryParameters);
        $urlQuery = $endpoint . '?' . $queryString;

        $result = new MigvansDto();
        $response = $this->GetRequest($urlQuery);
        foreach ($response as $itemRec) {
            foreach ($itemRec['CUSTPART_SUBFORM'] as $subItem) {
                $obj = new MigvanDto();
                $obj->sku = $subItem['PARTNAME'];
                $obj->userExId = $itemRec['CUSTNAME'];
                $result->migvans[] = $obj;
            }
        }

        return $result;
    }
    public function GetPriceList(): PriceListsDto
    {
        $endpoint = "/PRICELIST";

        $response = $this->GetRequest($endpoint);

        $dto = new PriceListsDto();
        foreach ($response as $itemRec){
            $obj = new PriceListDto();

            $obj->priceListExtId = $itemRec['PLNAME'];
            $obj->priceListTitle = $itemRec['PLDES'] ;
            $obj->priceListExperationDate = $itemRec['PLDATE'];
            $dto->priceLists[] = $obj;
        }

        return $dto;

    }

    public function GetPriceListUser(): PriceListsUserDto
    {
        $endpoint = "/CUSTOMERS";
        $queryExtras = [
            '$expand' => "CUSTPLIST_SUBFORM"
        ];
        $queryString = http_build_query($queryExtras);
        $urlQuery = $endpoint . '?' . $queryString;
        $response = $this->GetRequest($urlQuery);
        $dto = new PriceListsUserDto();

        foreach ($response as $itemRec) {
            foreach ($itemRec['CUSTPLIST_SUBFORM'] as $subRec) {
                if ($itemRec['CUSTNAME']) {
                    $userDto = new PriceListUserDto();
                    $userDto->userExId = $itemRec['CUSTNAME'];
                    $userDto->priceListExId = $subRec['PLNAME'];
                    $dto->priceLists[] = $userDto;
                }
            }
        }

        return $dto;
    }

    public function GetPrices():PricesDto
    {

    }
    public function GetMigvansOnline(?array $skus): MigvansDto
    {
        // TODO: Implement GetMigvansOnline() method.
    }
    public function GetStocks(): StocksDto
    {

        $endpoint = "/LOGPART";
        $queryExtras = [
            '$expand' => "LOGCOUNTERS_SUBFORM"
        ];
        $queryString = http_build_query($queryExtras);
        $urlQuery = $endpoint . '?' . $queryString;

        $response = $this->GetRequest($urlQuery);
        $result = new StocksDto();
        foreach ($response as $itemRec) {
            foreach ($itemRec['LOGCOUNTERS_SUBFORM'] as $subRec) {
                $obj = new StockDto();
                $obj->sku = $itemRec['PARTNAME'];
                $obj->stock = $subRec['BALANCE'];
                $result->stocks[] = $obj;
            }
        }
        return $result;
    }
    public function GetCategories(): CategoriesDto
    {
        $data = $this->GetRequest('/FAMILYTYPES');
        $categoryResult = new CategoriesDto();

        foreach ($data as $itemRec){
            if($itemRec['FTNAME']){
                $obj = new CategoryDto();
                $obj->categoryId = $itemRec['FTCODE'];
                $obj->categoryName = $itemRec['FTNAME'];
                $categoryResult->categories[] = $obj;
            }
        }

        return  $categoryResult;
    }
    public function GetPriceListDetailed(): PriceListsDetailedDto
    {
//        $endpoint = "/PRICELIST";
//        $queryExtras = [
//            '$expand' => "PARTPRICE2_SUBFORM"
//        ];
//        $queryString = http_build_query($queryExtras);
//        $urlQuery = $endpoint . '?' . $queryString;
        $urlQuery = '/PRICELIST?$expand=PARTPRICE2_SUBFORM&$top=100&$skip=600';
//        dd($urlQuery);
        $response = $this->GetRequest($urlQuery);
//        dd($response);
        $dto = new PriceListsDetailedDto();
        foreach ($response as $itemRec){
            foreach ($itemRec['PARTPRICE2_SUBFORM'] as $subRec){
                $obj = new PriceListDetailedDto();
                $obj->sku = $subRec['PARTNAME'];
                $obj->price = $subRec['PRICE'] ;
                $obj->priceList = $itemRec['PLNAME'];
                $obj->discount = $subRec['PERCENT'] ;
                $dto->priceListsDetailed[] = $obj;
            }
        }

        return $dto;
    }
    private function ImplodeQueryByMakats(array $makats)
    {
        $filterParts = [];
        foreach ($makats as $sku) {
            $filterParts[] = "PARTNAME eq '$sku'";
        }

        $filterString = implode(' or ', $filterParts);
        return $filterString;
    }

    private function ImplodeQueryByPlname(array $priceList)
    {
        $filterParts = [];
        foreach ($priceList as $pricePlname) {
            $filterParts[] = "PLNAME eq '$pricePlname'";
        }

        $filterString = implode(' or ', $filterParts);
        return $filterString;
    }

    public function GetPackMain(): PacksMainDto
    {
        $endpoint = "/PARTPARAM";
        $queryExtras = [
            '$expand' => "PARTPACK_SUBFORM"
        ];
        $queryString = http_build_query($queryExtras);
        $urlQuery = $endpoint . '?' . $queryString;

        $response = $this->GetRequest($urlQuery);
        $result = new PacksMainDto();
        foreach ($response as $itemRec) {
            foreach ($itemRec['PARTPACK_SUBFORM'] as $subRec) {
                $obj = new PackMainDto();
                $obj->name = $subRec['PACKNAME'];
                $obj->extId = $subRec['PACKCODE'];
                $obj->barcode = $subRec['BARCODE'];
                $obj->quantity = $subRec['PACKQUANT'];
                $result->packs[] = $obj;
            }
        }
        return $result;
    }

    public function GetPackProducts(): PacksProductDto
    {
        $endpoint = "/PARTPARAM";
        $queryExtras = [
            '$expand' => "PARTPACK_SUBFORM"
        ];
        $queryString = http_build_query($queryExtras);
        $urlQuery = $endpoint . '?' . $queryString;

        $response = $this->GetRequest($urlQuery);
        $result = new PacksProductDto();
        foreach ($response as $itemRec) {
            foreach ($itemRec['PARTPACK_SUBFORM'] as $subRec) {
                $obj = new PackProductDto();
                $obj->sku = $itemRec['PARTNAME'];
                $obj->packExtId = $subRec['PACKCODE'];
                $result->packs[] = $obj;
            }
        }
        return $result;
    }
}