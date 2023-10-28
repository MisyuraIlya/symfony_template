<?php

namespace App\Command;

use App\Cron\GetBasePrice;
use App\Cron\GetCategories;
use App\Cron\GetMainAttributes;
use App\Cron\GetMigvans;
use App\Cron\GetPriceList;
use App\Cron\GetPriceListDetailed;
use App\Cron\GetProducts;
use App\Cron\GetStocks;
use App\Cron\GetSubAttributes;
use App\Cron\GetSubProducts;
use App\Cron\GetSubUsers;
use App\Cron\GetUsers;
use App\Repository\AttributeMainRepository;
use App\Repository\ErrorRepository;
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

    public function __construct(
        private HttpClientInterface                  $httpClient,
        private readonly UserRepository              $userRepository,
        private readonly SubUserRepository           $subUsersRepository,
        private readonly CategoryRepository          $categoryRepository,
        private readonly ProductRepository           $productRepository,
        private readonly SubProductRepository        $subProductRepository,
        private readonly PriceListRepository         $priceListRepository,
        private readonly PriceListDetailedRepository $priceListDetailedRepository,
        private readonly MigvanRepository            $migvanRepository,
        private readonly AttributeMainRepository     $attributeMainRepository,
        private readonly SubAttributeRepository      $SubAttributeRepository,
        private readonly ErrorRepository $errorRepository,
    )
    {
        parent::__construct();
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

        (new GetPriceList(
            $this->httpClient,
            $this->priceListRepository,
            $this->errorRepository
        ))->sync();
        (new GetUsers(
            $this->httpClient,
            $this->userRepository,
            $this->priceListRepository,
            $this->errorRepository
        ))->sync();
//       (new GetSubUsers(
//            $this->httpClient,
//            $this->userRepository,
//            $this->subUsersRepository,
//           $this->errorRepository
//         ))->sync();
        (new GetCategories(
            $this->httpClient,
            $this->categoryRepository,
            $this->errorRepository
        ))->sync();
        (new GetProducts(
            $this->httpClient,
            $this->categoryRepository,
            $this->productRepository,
            $this->errorRepository
        ))->sync();
//        (new GetMainAttributes(
//            $this->httpClient,
//            $this->attributeMainRepository,
//            $this->errorRepository
//        ))->sync();
        (new GetSubAttributes(
            $this->httpClient,
            $this->SubAttributeRepository,
            $this->productRepository,
            $this->attributeMainRepository,
            $this->errorRepository
        ))->sync();
//        (new GetSubProducts(
//            $this->httpClient,
//            $this->subProductRepository,
//            $this->productRepository,
//            $this->errorRepository
//        ))->sync();

        (new GetPriceListDetailed(
            $this->httpClient,
            $this->productRepository,
            $this->priceListRepository,
            $this->priceListDetailedRepository,
            $this->errorRepository
        ))->sync();
        (new GetMigvans(
            $this->httpClient,
            $this->migvanRepository,
            $this->userRepository,
            $this->productRepository,
            $this->errorRepository
        ))->sync();
        (new GetStocks(
            $this->httpClient,
            $this->productRepository,
            $this->errorRepository
        ))->sync();

        (new GetBasePrice(
            $this->httpClient,
            $this->productRepository,
            $this->errorRepository
        ))->sync();


        $io->success('All Cron Function Executed');
        return Command::SUCCESS;
    }
}
