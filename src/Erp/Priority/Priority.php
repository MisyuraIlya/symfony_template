<?php

namespace App\Erp\Priority;

use App\Entity\User;
use App\Enum\DocumentsType;
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
use App\Erp\Dto\PriceDto;
use App\Erp\Dto\PriceListDetailedDto;
use App\Erp\Dto\PriceListDto;
use App\Erp\Dto\PriceListsDetailedDto;
use App\Erp\Dto\PriceListsDto;
use App\Erp\Dto\PricesDto;
use App\Erp\Dto\ProductDto;
use App\Erp\Dto\ProductsDto;
use App\Erp\Dto\StocksDto;
use App\Erp\Dto\UserDto;
use App\Erp\Dto\UsersDto;
use App\Erp\ErpInterface;
use App\Erp\Enums\PriorityEnums;
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
                    'auth_basic' => ['API', 'ap#25!42']
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
        $response = $this->httpClient->request(
            'POST',
            $this->url.$table,
            [
                'auth_basic' => ['API', 'ap#25!42'],
                'timeout' => 60,
                'body' => $obj
            ]
        );

        $statusCode = $response->getStatusCode();
        $contentType = $response->getHeaders()['content-type'][0];
        $content = $response->getContent();
        $content = $response->toArray();
        return $content['value'];
    }

    public function GetPricesOnline(?array $skus, ?string $priceList):PricesDto
    {
        $result = new PricesDto();
        $queryFilter = $this->ImplodeQueryByMakats($skus);

        $endpoint2 = "/PRICELIST";
        $queryParameters2 = [
            '$filter' => "PLNAME eq '$priceList'",
            '$expand' => 'PARTPRICE2_SUBFORM($filter='. $queryFilter .' )',
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
                $result->prices[] = $dto;
            }
        }
        return $result;
    }
    public function GetStocksOnline(?array $skus):StocksDto
    {

    }

    public function GetOnlineUser(string $userExtId):User
    {

    }
    public function SendOrder(int $historyId)
    {

    }
    public function GetMigvanOnline()
    {

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
    public function PurchaseHistoryPerUser(string $userExtId)
    {

    }

    /** FOR CRON */
    public function GetProducts(): ProductsDto
    {
        $endpoint = "/LOGPART";
        $queryExtras = [
            '$filter' => "SPEC1 eq 'מוצר'",
            '$expand' => "PARTARC_SUBFORM"
        ];
        $queryString = http_build_query($queryExtras);
        $urlQuery = $endpoint . '?' . $queryString;

        $dtoRes = new ProductsDto();
        $response = $this->GetRequest($urlQuery);
        foreach ($response as $itemRec){
            $dto = new ProductDto();
            $dto->sku = $itemRec['PARTNAME'];
            $dto->categoryId = $itemRec['FAMILYNAME'];
            $dto->categoryDescription = $itemRec['FAMILYDES'];
            $dto->barcode = $itemRec['BARCODE'];
            $dto->title = $itemRec['PARTDES'];
            if($itemRec['STATDES'] === 'פעיל'){
                $dto->status = true;
            } else {
                $dto->status = false;
            }
            $dto->Extra1 = $itemRec['SPEC1'];
            $dto->Extra2 = $itemRec['SPEC2'];
            $dto->Extra3 = $itemRec['SPEC3'];
            $dto->Extra4 = $itemRec['SPEC4'];
            $dto->Extra5 = $itemRec['SPEC5'];
            $dto->Extra7 = $itemRec['SPEC7'];
            $dto->Extra8 = $itemRec['SPEC8'];
            $dto->Extra9 = $itemRec['SPEC9'];
            $dto->Extra10 = $itemRec['SPEC10'];
            $dto->Extra11 = $itemRec['SPEC11'];
            $dto->Extra12 = $itemRec['SPEC12'];
            $dto->Extra13 = $itemRec['SPEC13'];
            $dto->Extra14 = $itemRec['SPEC14'];
            $dto->Extra15 = $itemRec['SPEC15'];
            $dto->Extra16 = $itemRec['SPEC16'];
            $dto->Extra17 = $itemRec['SPEC17'];
            $dto->Extra18 = $itemRec['SPEC18'];
            $dto->Extra19 = $itemRec['SPEC19'];
            $dto->Extra20 = $itemRec['SPEC20'];
            $dto->baseprice = $itemRec['BASEPLPRICE'];
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
        $response = $this->GetRequest('/CUSTOMERS?$expand=CUSTDISCOUNT_SUBFORM,CUSTPLIST_SUBFORM');
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

                $userDto = new UserDto();
                $userDto->userExId = $userRec['CUSTNAME'];
                $userDto->userDescription = $userRec['CUSTDES'];
                $userDto->name = $userRec['CUSTDES'];
                $userDto->isBlocked = $userRec['INACTIVEFLAG'] === 'Y' ? false : true;
                $userDto->maxObligo = $userRec['MAX_OBLIGO'];
                $userDto->maxCredit = $userRec['MAX_CREDIT'];
                $userDto->phone = $userRec['PHONE'];
                $userDto->address = $userRec['ADDRESS'];
                $userDto->town = $userRec['STATE'];
                $userDto->globalDiscount = $globalDiscount;
                $userDto->priceList = $priceList;
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
    public function GetPrices():PricesDto
    {

    }

    public function GetMigvansOnline(?array $skus): MigvansDto
    {
        // TODO: Implement GetMigvansOnline() method.
    }

    public function GetStocks(): StocksDto
    {
        // TODO: Implement GetStocks() method.
    }

    public function GetCategories(): CategoriesDto
    {
        $data = $this->GetRequest('/FAMILY_LOG');
        $categoryResult = new CategoriesDto();

        foreach ($data as $itemRec){
            $obj = new CategoryDto();
            $obj->categoryId = $itemRec['FAMILYNAME'];
            $obj->categoryName = $itemRec['FAMILYDESC'];
            $categoryResult->categories[] = $obj;
        }

        return  $categoryResult;
    }

    public function GetPriceListDetailed(): PriceListsDetailedDto
    {
        $endpoint = "/PRICELIST";
        $queryExtras = [
            '$expand' => "PARTPRICE2_SUBFORM"
        ];
        $queryString = http_build_query($queryExtras);
        $urlQuery = $endpoint . '?' . $queryString;
        $response = $this->GetRequest($urlQuery);
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


}