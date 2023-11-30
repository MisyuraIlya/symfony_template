<?php

namespace App\Erp;

use App\Entity\Error;
use App\Entity\User;
use App\Erp\Dto\CartessetDto;
use App\Erp\Dto\CategoriesDto;
use App\Erp\Dto\DocumentItemsDto;
use App\Erp\Dto\DocumentsDto;
use App\Erp\Dto\MigvansDto;
use App\Erp\Dto\PacksMainDto;
use App\Erp\Dto\PacksProductDto;
use App\Erp\Dto\PriceListsDetailedDto;
use App\Erp\Dto\PriceListsDto;
use App\Erp\Dto\PriceListsUserDto;
use App\Erp\Dto\PricesDto;
use App\Erp\Dto\ProductsDto;
use App\Erp\Dto\PurchaseHistory;
use App\Erp\Dto\StocksDto;
use App\Erp\Dto\UsersDto;
use App\Erp\Priority\Priority;
use App\Repository\ErrorRepository;
use App\Repository\HistoryDetailedRepository;
use App\Repository\HistoryRepository;
use Lcobucci\JWT\Exception;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ErpManager implements ErpInterface
{
    private $erp;

    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly ErrorRepository $errorRepository,
    )
    {
        $erpType =  $_ENV['ERP_TYPE'];
        $username =  $_ENV['ERP_USERNAME'];
        $password =  $_ENV['ERP_PASSWORD'];
        $url = $_ENV['ERP_URL'];
        if ($erpType === 'Priority') {
            $this->erp = new Priority($url, $username, $password, $this->httpClient);
        } elseif ($erpType === 'SAP') {
        } else {
            throw new \Exception("Unsupported ERP type: $erpType");
        }
    }

    public function GetRequest(?string $query)
    {
        try {
            return $this->erp->GetRequest($query);
        } catch (\Throwable $e){
            $error = new Error();
            $error->setFunctionName('[ERP MANAGER] Get Request');
            $error->setDescription($e->getMessage());
            $this->errorRepository->createError($error, true);
        }
    }

    public function PostRequest(object $object, string $table)
    {
        return $this->erp->PostRequest($object, $table);
    }

    public function GetPricesOnline(?array $skus, ?array $priceList):PricesDto
    {
        return $this->erp->GetPricesOnline($skus, $priceList);
    }
    public function GetStocksOnline(?array $skus):StocksDto
    {
        return $this->erp->GetStocksOnline($skus);
    }

    public function GetOnlineUser(string $userExtId):User
    {
        return $this->erp->GetOnlineUser($userExtId);
    }
    public function SendOrder(int $historyId, HistoryRepository $historyRepository, HistoryDetailedRepository $historyDetailedRepository)
    {
        return $this->erp->SendOrder($historyId,$historyRepository,$historyDetailedRepository);
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
    public function PurchaseHistoryByUserAndSku(string $userExtId, string $sku): PurchaseHistory
    {
        return $this->erp->PurchaseHistoryByUserAndSku($userExtId,$sku);
    }

    /** FOR CRON */
    public function GetProducts(?int $pageSize, ?int $skip): ProductsDto
    {
        return $this->erp->GetProducts($pageSize,$skip);
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

    public function GetPriceListUser(): PriceListsUserDto
    {
        return $this->erp->GetPriceListUser();
    }


    public function GetPriceListDetailed(): PriceListsDetailedDto
    {
        return $this->erp->GetPriceListDetailed();
    }

    public function GetSubUsers(): UsersDto
    {
        return $this->erp->GetSubUsers();
    }

    public function GetPackMain(): PacksMainDto
    {
        return $this->erp->GetPackMain();
    }

    public function GetPackProducts(): PacksProductDto
    {
        return $this->erp->GetPackProducts();
    }
}