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
use App\Erp\Dto\PriceListsUserDto;
use App\Erp\Dto\PricesDto;
use App\Erp\Dto\PurchaseHistory;
use App\Erp\Dto\StocksDto;
use App\Erp\Dto\UsersDto;
use App\Erp\Dto\ProductsDto;
use App\Repository\HistoryDetailedRepository;
use App\Repository\HistoryRepository;

interface ErpInterface
{
    /** CORE */
    public function GetRequest(?string $query);
    public function PostRequest(object $object, string $table);

    /** ONLINE */
    public function GetPricesOnline(?array $skus, ?string $priceList): PricesDto;
    public function GetStocksOnline(?array $skus): StocksDto;
    public function GetOnlineUser(string $userExtId): User;
    public function SendOrder(int $historyId, HistoryRepository $historyRepository, HistoryDetailedRepository $historyDetailedRepository);
    public function GetMigvansOnline(?array $skus): MigvansDto;
    public function GetDocuments(string $userExId, \DateTimeImmutable $dateFrom, \DateTimeImmutable $dateTo, string $documentType,  ?int $limit = 10): DocumentsDto;
    public function GetDocumentsItem(string $documentNumber): DocumentItemsDto;
    public function GetCartesset(string $userExId, \DateTimeImmutable $dateFrom, \DateTimeImmutable $dateTo): CartessetDto;
    public function PurchaseHistoryByUserAndSku(string $userExtId, string $sku): PurchaseHistory;

    /** FOR CRON */
    public function GetCategories(): CategoriesDto;
    public function GetProducts(?int $pageSize, ?int $skip): ProductsDto;
    public function GetSubProducts(): ProductsDto;
    public function GetUsers(): UsersDto;
    public function GetSubUsers(): UsersDto;
    public function GetMigvan(): MigvansDto;
    public function GetPriceList(): PriceListsDto;
    public function GetPriceListUser(): PriceListsUserDto;
    public function GetPriceListDetailed(): PriceListsDetailedDto;
    public function GetStocks(): StocksDto;

//    public function GetPrices(): PricesDto;




}