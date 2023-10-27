<?php

namespace App\Erp;

use App\Entity\User;
use App\Erp\Dto\CartessetDto;
use App\Erp\Dto\CategoriesDto;
use App\Erp\Dto\DocumentItemsDto;
use App\Erp\Dto\DocumentsDto;
use App\Erp\Dto\MigvansDto;
use App\Erp\Dto\PriceListsDetailedDto;
use App\Erp\Dto\PriceListsDto;
use App\Erp\Dto\PricesDto;
use App\Erp\Dto\ProductsDto;
use App\Erp\Dto\StocksDto;
use App\Erp\Dto\UsersDto;
use App\Erp\Priority\Priority;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ErpManager implements ErpInterface
{
    private $erp;

    public function __construct(
        private readonly HttpClientInterface $httpClient,
    )
    {
        $erpType = 'Priority';
        $username = 'digitrade';
        $password = 'Digitrade22';
        $url = 'https://817.152.co.il/odata/Priority/tabula.ini/teser';
        if ($erpType === 'Priority') {
            $this->erp = new Priority($url, $username, $password, $this->httpClient);
        } elseif ($erpType === 'SAP') {
        } else {
            throw new \Exception("Unsupported ERP type: $erpType");
        }
    }

    public function GetRequest(?string $query)
    {
        return $this->erp->GetRequest($query);
    }

    public function PostRequest(object $object, string $table)
    {
        return $this->erp->PostRequest($object, $table);
    }

    public function GetPricesOnline(?array $skus, ?string $priceList):PricesDto
    {
        return $this->erp->GetPricesOnline($skus, $priceList);
    }
    public function GetStocksOnline(?array $skus):StocksDto
    {
        return $this->erp->GetStocksOnline($skus);
    }

    public function GetOnlineUser(string $userExtId):User
    {
        return $this->erp->GetOnlineUser();
    }
    public function SendOrder(int $historyId)
    {
        return $this->erp->SendOrder($historyId);
    }
    public function GetMigvanOnline(string $userExtId): MigvansDto
    {
        return $this->erp->GetMigvanOnline($userExtId);
    }
    public function GetDocuments(string $userExId, \DateTimeImmutable $dateFrom, \DateTimeImmutable $dateTo, string $documentType ,?int $limit = 10): DocumentsDto
    {

        return $this->erp->GetDocuments($userExId, $dateFrom,$dateTo, $documentType, $limit);
    }
    public function GetDocumentsItem(string $documentNumber): DocumentItemsDto
    {
        return $this->erp->GetDocumentsItem($documentNumber);
    }
    public function GetCartesset(string $userExId, \DateTimeImmutable $dateFrom, \DateTimeImmutable $dateTo): CartessetDto
    {
        return $this->erp->GetCartesset($userExId,$dateFrom,$dateTo);
    }
    public function PurchaseHistoryPerUser(string $userExtId)
    {
        return $this->erp->PurchaseHistoryPerUser();
    }

    /** FOR CRON */
    public function GetProducts(): ProductsDto
    {
        return $this->erp->GetProducts();
    }

    public function GetSubProducts(): ProductsDto
    {
        return $this->erp->GetSubProducts();
    }

    public function GetUsers(): UsersDto
    {
        return $this->erp->GetUsers();
    }
    public function GetMigvan():MigvansDto
    {
        return $this->erp->GetMigvan();
    }

    public function GetPrices(): PricesDto
    {
        return $this->erp->GetPrices();
    }

    public function GetMigvansOnline(?array $skus): MigvansDto
    {
    }

    public function GetStocks(): StocksDto
    {
        return $this->erp->GetStocks();
    }

    public function GetCategories(): CategoriesDto
    {
        return $this->erp->GetCategories();
    }

    public function GetPriceList(): PriceListsDto
    {
        return $this->erp->GetPriceList();
    }

    public function GetPriceListDetailed(): PriceListsDetailedDto
    {
        return $this->erp->GetPriceListDetailed();
    }

    public function GetSubUsers(): UsersDto
    {
        return $this->erp->GetSubUsers();
    }
}