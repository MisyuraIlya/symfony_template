<?php

namespace App\Command;

use App\Cron\GetBasePrice;
use App\Cron\GetCategories;
use App\Cron\GetMainAttributes;
use App\Cron\GetMigvans;
use App\Cron\GetPriceList;
use App\Cron\GetPriceListDetailed;
use App\Cron\GetPriceListUser;
use App\Cron\GetProducts;
use App\Cron\GetStocks;
use App\Cron\GetSubAttributes;
use App\Cron\GetSubProducts;
use App\Cron\GetSubUsers;
use App\Cron\GetUsers;
use App\Repository\AttributeMainRepository;
use App\Repository\ErrorRepository;
use App\Repository\PriceListUserRepository;
use App\Repository\ProductAttributeRepository;
use App\Repository\SubAttributeRepository;
use App\Repository\CategoryRepository;
use App\Repository\MigvanRepository;
use App\Repository\PriceListDetailedRepository;
use App\Repository\PriceListRepository;
use App\Repository\ProductRepository;
use App\Repository\SubProductRepository;
use App\Repository\SubUserRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[AsCommand(
    name: 'CronManager',
    description: 'Add a short description for your command',
)]
class CronManagerCommand extends Command
{
    private $entityManager;
    private bool $isOnlinePrice;
    private bool $isOnlineMigvan;
    private bool $isUsedMigvan;

    public function __construct(
        private HttpClientInterface                  $httpClient,
        private readonly UserRepository              $userRepository,
        private readonly CategoryRepository          $categoryRepository,
        private readonly ProductRepository           $productRepository,
        private readonly PriceListRepository         $priceListRepository,
        private readonly PriceListDetailedRepository $priceListDetailedRepository,
        private readonly MigvanRepository            $migvanRepository,
        private readonly AttributeMainRepository     $attributeMainRepository,
        private readonly SubAttributeRepository      $SubAttributeRepository,
        private readonly ErrorRepository $errorRepository,
        private readonly ProductAttributeRepository $productAttributeRepository,
        private readonly PriceListUserRepository $priceListUserRepository,
    )
    {
        parent::__construct();
        $this->isOnlinePrice = $_ENV['IS_ONLINE_PRICE'] === "true";
        $this->isOnlineMigvan = $_ENV['IS_ONLINE_MIGVAN'] === "true";
        $this->isUsedMigvan = $_ENV['IS_USED_MIGVAN'] === "true";
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

//        (new GetPriceList(
//            $this->httpClient,
//            $this->priceListRepository,
//            $this->errorRepository
//        ))->sync();


//        (new GetUsers(
//            $this->httpClient,
//            $this->userRepository,
//            $this->errorRepository
//        ))->sync();

        (new GetPriceListUser(
            $this->httpClient,
            $this->errorRepository,
            $this->userRepository,
            $this->priceListRepository,
            $this->priceListUserRepository,
        ))->sync();

//        (new GetCategories(
//            $this->httpClient,
//            $this->categoryRepository,
//            $this->errorRepository
//        ))->sync();
//        (new GetProducts(
//            $this->httpClient,
//            $this->categoryRepository,
//            $this->productRepository,
//            $this->errorRepository
//        ))->sync();









//        (new GetMainAttributes(
//            $this->httpClient,
//            $this->attributeMainRepository,
//            $this->errorRepository
//        ))->sync();
//        (new GetSubAttributes(
//            $this->httpClient,
//            $this->SubAttributeRepository,
//            $this->productRepository,
//            $this->attributeMainRepository,
//            $this->errorRepository,
//            $this->productAttributeRepository,
//        ))->sync();
//        if(!$this->isOnlinePrice && !$this->isOnlineMigvan) {
//            (new GetPriceListDetailed(
//                $this->httpClient,
//                $this->productRepository,
//                $this->priceListRepository,
//                $this->priceListDetailedRepository,
//                $this->errorRepository
//            ))->sync();
//        }
//
//        if(!$this->isUsedMigvan) {
//            (new GetMigvans(
//                $this->httpClient,
//                $this->migvanRepository,
//                $this->userRepository,
//                $this->productRepository,
//                $this->errorRepository
//            ))->sync();
//        }
//
//        (new GetStocks(
//            $this->httpClient,
//            $this->productRepository,
//            $this->errorRepository
//        ))->sync();
//
//        (new GetBasePrice(
//            $this->httpClient,
//            $this->productRepository,
//            $this->errorRepository
//        ))->sync();


        $io->success('All Cron Function Executed');
        return Command::SUCCESS;
    }
}
