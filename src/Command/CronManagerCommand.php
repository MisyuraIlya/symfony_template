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

//        $arg1 = $input->getArgument('arg1');
//
//        if ($arg1) {
//            $io->note(sprintf('You passed an argument: %s', $arg1));
//        }
//
//        if ($input->getOption('option1')) {
//            // ...
//        }

//        (new GetPriceList(
//            $this->httpClient,
//            $this->priceListRepository
//        ))->sync();
        (new GetUsers($this->httpClient, $this->userRepository, $this->priceListRepository))->sync();
////        (new GetSubUsers($this->httpClient, $this->userRepository, $this->subUsersRepository))->sync();
//        (new GetCategories(
//            $this->httpClient,
//            $this->categoryRepository,
//        ))->sync();
//        (new GetProducts(
//            $this->httpClient,
//            $this->categoryRepository,
//            $this->productRepository
//        ))->sync();
//        (new GetMainAttributes(
//            $this->httpClient,
//            $this->attributeMainRepository
//        ))->sync();
//        (new GetSubAttributes(
//            $this->httpClient,
//            $this->SubAttributeRepository,
//            $this->productRepository,
//            $this->attributeMainRepository
//        ))->sync();
//        (new GetSubProducts(
//            $this->httpClient,
//            $this->subProductRepository,
//            $this->productRepository
//        ))->sync();

//        (new GetPriceListDetailed(
//            $this->httpClient,
//            $this->productRepository,
//            $this->priceListRepository,
//            $this->priceListDetailedRepository
//        ))->sync();
//        (new GetMigvans(
//            $this->httpClient,
//            $this->migvanRepository,
//            $this->userRepository,
//            $this->productRepository
//        ))->sync();
//        (new GetStocks(
//            $this->httpClient,
//            $this->productRepository
//        ))->sync();

//        (new GetBasePrice(
//            $this->httpClient,
//            $this->productRepository
//        ))->sync();


        $io->success('All Cron Function Executed');
        return Command::SUCCESS;
    }
}
