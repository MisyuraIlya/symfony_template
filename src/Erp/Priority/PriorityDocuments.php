<?php

namespace App\Erp\Priority;
use App\Erp\Dto\DocumentItemDto;
use App\Erp\Dto\DocumentItemsDto;
use Doctrine\DBAL\Types\DateImmutableType;
use App\Erp\Dto\DocumentDto;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class PriorityDocuments extends Priority
{
    public function __construct(string $url, string $username, string $password, HttpClientInterface $httpClient)
    {
        parent::__construct($url, $username, $password, $httpClient);
        $this->httpClient = $httpClient;
    }

    public function GetOrders(string $userExId, \DateTimeImmutable $dateFrom , \DateTimeImmutable $dateTo)
    {
        $endpoint = "/ORDERS";
        $dateFrom = $dateFrom->format('Y-m-d\TH:i:s.u\Z');
        $dateTo = $dateTo->format('Y-m-d\TH:i:s.u\Z');
//        if($searchValue){
//            $queryParameters = [
//                '$filter' => "CUSTNAME eq '$userExId' AND ORDNAME eq '$searchValue'",
//            ];
//        } else {
            $queryParameters = [
                '$filter' => "CUSTNAME eq '$userExId' and CURDATE ge $dateFrom and CURDATE le $dateTo",
            ];
//        }

        $queryString = http_build_query($queryParameters);
        $urlQuery = $endpoint . '?' . $queryString;

        $response = $this->GetRequest($urlQuery);
        $result = [];
        foreach ($response as $itemRec) {
            $dto = new DocumentDto();
            $dto->user_name = $itemRec['CDES'];
            $dto->userExId = $itemRec['CUSTNAME'];
            $dto->total = $itemRec['QPRICE'];
            $dto->date = $itemRec['CURDATE'];
            $dto->type = 'הזמנות';
            $dto->status = $itemRec['ORDSTATUSDES'];
            $dto->document_number = $itemRec['ORDNAME'];
            $dto->date_payed = $itemRec['STATUSDATE'];
            $result[] = $dto;
        }

        return $result;
    }

    public function GetOrderItems(string $documentNumber): DocumentItemsDto
    {
        $endpoint = "/ORDERS";
        $queryParameters = [
            '$filter' => "ORDNAME eq '$documentNumber'",
            '$expand' => "ORDERITEMS_SUBFORM"
        ];


        $queryString = http_build_query($queryParameters);
        $urlQuery = $endpoint . '?' . $queryString;
        $response = $this->GetRequest($urlQuery);
        $result = new DocumentItemsDto();
        foreach ($response as $itemRec) {
            $result->totalAfterDiscount = $itemRec['DISPRICE'];
            $result->totalPrecent = $itemRec['PERCENT'];
            $result->totalPriceAfterTax = $itemRec['TOTPRICE'];
            $result->totalTax = $itemRec['VAT'];
            $result->documentType = 'הזמנה';
            foreach ($itemRec['ORDERITEMS_SUBFORM'] as $subItem){
                $dto = new DocumentItemDto();
                $dto->sku = $subItem['PARTNAME'];
                $dto->title = $subItem['PDES'];
                $dto->quantity = $subItem['TQUANT'];
                $dto->priceByOne = $subItem['PRICE'];
                $dto->total = $subItem['QPRICE'];
                $dto->discount = $subItem['PERCENT'];
                $result->products[] = $dto;
            }
        }

        return $result;
    }

    public function GetPriceOffer(string $userExId, string $dateFrom , string $dateTo)
    {
        $endpoint = "/CPROF";
//        if($searchValue) {
//            $queryParameters = [
//                '$filter' => "CUSTNAME eq '$userExId' AND CPROFNUM eq '$searchValue'",
//            ];
//        } else {
            $queryParameters = [
                '$filter' => "CUSTNAME eq '$userExId' and PDATE ge $dateFrom and PDATE le $dateTo",
            ];
//        }

        $queryString = http_build_query($queryParameters);
        $urlQuery = $endpoint . '?' . $queryString;

        $response = $this->GetRequest($urlQuery);

        $result = [];
        foreach ($response as $itemRec) {
            $dto = new DocumentDto();
            $dto->user_name = $itemRec['CDES'];
            $dto->userExId = $itemRec['CUSTNAME'];
            $dto->total = $itemRec['QPRICE'];
            $dto->date = $itemRec['PDATE'];
            $dto->type = 'הצעות מחיר';
            $dto->status = $itemRec['STATDES'];
            $dto->document_number = $itemRec['CPROFNUM'];
            $dto->date_payed = $itemRec['EXPIRYDATE'];
            $result[] = $dto;
        }

        return $result;
    }

    public function GetPriceOfferItem(string $documentNumber): DocumentItemsDto
    {
        $endpoint = "/CPROF";
        $queryParameters = [
            '$filter' => "CPROFNUM eq '$documentNumber'",
            '$expand' => "CPROFITEMS_SUBFORM"
        ];


        $queryString = http_build_query($queryParameters);
        $urlQuery = $endpoint . '?' . $queryString;
        $response = $this->GetRequest($urlQuery);
        $result = new DocumentItemsDto();
        foreach ($response as $itemRec) {
            $result->totalAfterDiscount = $itemRec['DISPRICE'];
            $result->totalPrecent = $itemRec['PERCENT'];
            $result->totalPriceAfterTax = $itemRec['TOTPRICE'];
            $result->totalTax = $itemRec['VAT'];
            $result->documentType = 'הצעת מחיר';
            foreach ($itemRec['CPROFITEMS_SUBFORM'] as $subItem){
                $dto = new DocumentItemDto();
                $dto->sku = $subItem['PARTNAME'];
                $dto->title = $subItem['PDES'];
                $dto->quantity = $subItem['TQUANT'];
                $dto->priceByOne = $subItem['PRICE'];
                $dto->total = $subItem['QPRICE'];
                $dto->discount = $subItem['PERCENT'];
                $result->products[] = $dto;
            }
        }

        return $result;
    }

    public function GetDeliveryOrder(string $userExId, string $dateFrom , string $dateTo)
    {
        $endpoint = "/DOCUMENTS_D";
//        if($searchValue) {
//            $queryParameters = [
//                '$filter' => "CUSTNAME eq '$userExId' AND DOCNO eq '$searchValue'",
//            ];
//        } else {
            $queryParameters = [
                '$filter' => "CUSTNAME eq '$userExId' and CURDATE ge $dateFrom and CURDATE le $dateTo",
            ];
//        }

        $queryString = http_build_query($queryParameters);
        $urlQuery = $endpoint . '?' . $queryString;

        $response = $this->GetRequest($urlQuery);

        $result = [];
        foreach ($response as $itemRec) {
            $dto = new DocumentDto();
            $dto->user_name = $itemRec['CDES'];
            $dto->userExId = $itemRec['CUSTNAME'];
            $dto->total = $itemRec['TOTQUANT'];
            $dto->date = $itemRec['CURDATE'];
            $dto->type = 'תעודות משלוח';
            $dto->status = $itemRec['STATDES'];
            $dto->document_number = $itemRec['DOCNO'];
            $dto->date_payed = $itemRec['UDATE'];
            $result[] = $dto;
        }

        return $result;
    }

    public function GetDeliveryOrderItem(string $documentNumber): DocumentItemsDto
    {
        $endpoint = "/DOCUMENTS_D";
        $queryParameters = [
            '$filter' => "DOCNO eq '$documentNumber'",
            '$expand' => "TRANSORDER_D_SUBFORM "
        ];


        $queryString = http_build_query($queryParameters);
        $urlQuery = $endpoint . '?' . $queryString;
        $response = $this->GetRequest($urlQuery);
        $result = new DocumentItemsDto();
        foreach ($response as $itemRec) {
            $result->totalAfterDiscount = $itemRec['DISPRICE'];
            $result->totalPrecent = $itemRec['PERCENT'];
            $result->totalPriceAfterTax = $itemRec['TOTPRICE'];
            $result->totalTax = $itemRec['VAT'];
            $result->documentType = 'תעודת משלוח';
            foreach ($itemRec['TRANSORDER_D_SUBFORM'] as $subItem) {
                $dto = new DocumentItemDto();
                $dto->sku = $subItem['PARTNAME'];
                $dto->quantity = $subItem['TQUANT'];
                $dto->title = $subItem['PDES'];
                $dto->priceByOne = $subItem['PRICE'];
                $dto->total = $subItem['QPRICE'];
                $dto->discount = $subItem['PERCENT'];
                $result->products[] = $dto;
            }
        }

        return $result;
    }

    public function GetAiInvoice(string $userExId, string $dateFrom , string $dateTo)
    {
        $endpoint = "/AINVOICES";
//        if($searchValue) {
//            $queryParameters = [
//                '$filter' => "CUSTNAME eq '$userExId' AND IVNUM eq '$searchValue'",
//            ];
//        } else {
            $queryParameters = [
                '$filter' => "CUSTNAME eq '$userExId' and IVDATE ge $dateFrom and IVDATE le $dateTo",
            ];
//        }

        $queryString = http_build_query($queryParameters);
        $urlQuery = $endpoint . '?' . $queryString;

        $response = $this->GetRequest($urlQuery);

        $result = [];
        foreach ($response as $itemRec) {
            $dto = new DocumentDto();
            $dto->user_name = $itemRec['CDES'];
            $dto->userExId = $itemRec['CUSTNAME'];
            $dto->total = $itemRec['QPRICE'];
            $dto->date = $itemRec['IVDATE'];
            $dto->type = 'חשבוניות מס';
            $dto->status = $itemRec['STATDES'];
            $dto->document_number = $itemRec['IVNUM'];
            $dto->date_payed = $itemRec['IVDATE'];
            $result[] = $dto;
        }

        return $result;
    }

    public function GetAiInvoiceItem(string $documentNumber): DocumentItemsDto
    {
        $endpoint = "/AINVOICES";
        $queryParameters = [
            '$filter' => "IVNUM eq '$documentNumber'",
            '$expand' => "AINVOICEITEMS_SUBFORM "
        ];


        $queryString = http_build_query($queryParameters);
        $urlQuery = $endpoint . '?' . $queryString;
        $response = $this->GetRequest($urlQuery);
        $result = new DocumentItemsDto();
        foreach ($response as $itemRec) {
            $result->totalAfterDiscount = $itemRec['DISPRICE'];
            $result->totalPrecent = $itemRec['PERCENT'];
            $result->totalPriceAfterTax = $itemRec['TOTPRICE'];
            $result->totalTax = $itemRec['VAT'];
            $result->documentType = 'חשבונית מס';
            foreach ($itemRec['AINVOICEITEMS_SUBFORM'] as $subItem) {
                $dto = new DocumentItemDto();
                $dto->sku = $subItem['PARTNAME'];
                $dto->title = $subItem['PDES'];
                $dto->quantity = $subItem['TQUANT'];
                $dto->priceByOne = $subItem['PRICE'];
                $dto->total = $subItem['QPRICE'];
                $dto->discount = $subItem['PERCENT'];
                $result->products[] = $dto;
            }
        }

        return $result;
    }

    public function GetCiInvoice(string $userExId, string $dateFrom , string $dateTo)
    {
        $endpoint = "/CINVOICES";
//        if($searchValue) {
//            $queryParameters = [
//                '$filter' => "CUSTNAME eq '$userExId' AND IVNUM eq '$searchValue'",
//            ];
//        } else {
            $queryParameters = [
                '$filter' => "CUSTNAME eq '$userExId' and IVDATE ge $dateFrom and IVDATE le $dateTo",
            ];
//        }

        $queryString = http_build_query($queryParameters);
        $urlQuery = $endpoint . '?' . $queryString;

        $response = $this->GetRequest($urlQuery);

        $result = [];
        foreach ($response as $itemRec) {
            $dto = new DocumentDto();
            $dto->user_name = $itemRec['CDES'];
            $dto->userExId = $itemRec['CUSTNAME'];
            $dto->total = $itemRec['TOTPRICE'];
            $dto->date = $itemRec['IVDATE'];
            $dto->type = 'חשבוניות מס מרכזות';
            $dto->status = $itemRec['STATDES'];
            $dto->document_number = $itemRec['IVNUM'];
            $dto->date_payed = $itemRec['IVDATE'];
            $result[] = $dto;
        }

        return $result;
    }

    public function GetCiInvoiceItem(string $documentNumber): DocumentItemsDto
    {
        $endpoint = "/CINVOICES";
        $queryParameters = [
            '$filter' => "IVNUM eq '$documentNumber'",
            '$expand' => "CINVOICEITEMS_SUBFORM "
        ];


        $queryString = http_build_query($queryParameters);
        $urlQuery = $endpoint . '?' . $queryString;
        $response = $this->GetRequest($urlQuery);
        $result = new DocumentItemsDto();
        foreach ($response as $itemRec) {
            $result->totalAfterDiscount = $itemRec['DISPRICE'];
            $result->totalPrecent = $itemRec['PERCENT'];
            $result->totalPriceAfterTax = $itemRec['TOTPRICE'];
            $result->totalTax = $itemRec['VAT'];
            $result->documentType = 'חשבונית מס מרכזת';
            foreach ($itemRec['CINVOICEITEMS_SUBFORM'] as $subItem) {
                $dto = new DocumentItemDto();
                $dto->sku = $subItem['PARTNAME'];
                $dto->quantity = $subItem['TQUANT'];
                $dto->title = $subItem['PDES'];
                $dto->priceByOne = $subItem['PRICE'];
                $dto->total = $subItem['QPRICE'];
                $dto->discount = $subItem['PERCENT'];
                $result->products[] = $dto;
            }
        }

        return $result;
    }

    public function GetReturnDocs(string $userExId, string $dateFrom , string $dateTo)
    {
        $endpoint = "/DOCUMENTS_N";
//        if($searchValue) {
//            $queryParameters = [
//                '$filter' => "CUSTNAME eq '$userExId' AND DOCNO eq '$searchValue'",
//            ];
//        } else {
            $queryParameters = [
                '$filter' => "CUSTNAME eq '$userExId' and CURDATE ge $dateFrom and CURDATE le $dateTo",
            ];
//        }

        $queryString = http_build_query($queryParameters);
        $urlQuery = $endpoint . '?' . $queryString;

        $response = $this->GetRequest($urlQuery);

        $result = [];
        foreach ($response as $itemRec) {
            $dto = new DocumentDto();
            $dto->user_name = $itemRec['CDES'];
            $dto->userExId = $itemRec['CUSTNAME'];
            $dto->total = $itemRec['TOTPRICE'];
            $dto->date = $itemRec['CURDATE'];
            $dto->type = 'החזרות';
            $dto->status = $itemRec['STATDES'];
            $dto->document_number = $itemRec['DOCNO'];
            $dto->date_payed = $itemRec['UDATE'];
            $result[] = $dto;
        }

        return $result;
    }

    public function GetReturnDocsItem(string $documentNumber): DocumentItemsDto
    {
        $endpoint = "/DOCUMENTS_N";
        $queryParameters = [
            '$filter' => "DOCNO eq '$documentNumber'",
            '$expand' => "TRANSORDER_N_SUBFORM "
        ];


        $queryString = http_build_query($queryParameters);
        $urlQuery = $endpoint . '?' . $queryString;
        $response = $this->GetRequest($urlQuery);
        $result = new DocumentItemsDto();
        foreach ($response as $itemRec) {
            $result->totalAfterDiscount = $itemRec['DISPRICE'];
            $result->totalPrecent = $itemRec['PERCENT'];
            $result->totalPriceAfterTax = $itemRec['TOTPRICE'];
            $result->totalTax = $itemRec['VAT'];
            $result->documentType = 'החזרות';
            foreach ($itemRec['TRANSORDER_N_SUBFORM'] as $subItem) {
                $dto = new DocumentItemDto();
                $dto->sku = $subItem['PARTNAME'];
                $dto->quantity = $subItem['TQUANT'];
                $dto->title = $subItem['PDES'];
                $dto->priceByOne = $subItem['PRICE'];
                $dto->total = $subItem['QPRICE'];
                $dto->discount = $subItem['PERCENT'];
                $result->products[] = $dto;
            }
        }

        return $result;
    }
}