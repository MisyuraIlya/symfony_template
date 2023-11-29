<?php

namespace App\Command;

use App\Entity\MediaObject;
use App\Entity\ProductImages;
use App\Repository\MediaObjectRepository;
use App\Repository\ProductImagesRepository;
use App\Repository\ProductRepository;
use App\Service\FtpService;
use App\Service\ImageService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'CronImageUploader',
    description: 'Add a short description for your command',
)]
class CronImageUploaderCommand extends Command
{
    public function __construct(
        private readonly ProductRepository $productRepository,
        private readonly ProductImagesRepository $productImagesRepository,
        private readonly MediaObjectRepository $mediaObjectRepository,
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
        $arg1 = $input->getArgument('arg1');

        $sourceFolder = __DIR__.'/../../public/images';
        $targetFolder = __DIR__.'/../../public/imagesResized';
        $targetSizeBytes = 1024 * 1024; // 1 MB
        (new ImageService())::resizeImagesInFolder($sourceFolder, $targetFolder, $targetSizeBytes);
        $this->SaveImagesInDb();
        (new FtpService('ctb2b.co.il', 'src/img/products'))->uploadAllImagesFromResizedFolder();
        $this->DeletAll();
        $io->success('Images Successfuly resied and updated and loaded to ftp');

        return Command::SUCCESS;
    }

    private function SaveImagesInDb()
    {
        $targetFolder = __DIR__.'/../../public/imagesResized';
        if (!is_dir($targetFolder)) {
            throw new \Exception("The 'imagesResized' folder does not exist locally.");
        }

        $localFiles = scandir($targetFolder);
        foreach ($localFiles as $file) {
            if ($file !== '.' && $file !== '..') {
                $fileName = (explode('.', $file))[0];
                $product = $this->productRepository->findOneBySku($fileName);
                $isExistMediaObject = $this->mediaObjectRepository->findOneByFilePath($file);
                if($product && !$isExistMediaObject){
                    $newMedia = new MediaObject();
                    $newMedia->setSource('product');
                    $newMedia->setCreatedAt(new \DateTimeImmutable());
                    $newMedia->setFilePath($file);
                    $this->mediaObjectRepository->save($newMedia,true);

                    $newProductImage = new ProductImages();
                    $newProductImage->setProduct($product);
                    $newProductImage->setMediaObject($newMedia);
                    $this->productImagesRepository->save($newProductImage);


                    $product->setUpdatedAt(new \DateTimeImmutable());
                    $product->setDefaultImagePath($file);
                    $this->productRepository->createProduct($product,true);
                }
            }
        }
    }

    private function DeletAll()
    {
        $targetFolder = __DIR__.'/../../public/images';
        if (!is_dir($targetFolder)) {
            throw new \Exception("The 'images' folder does not exist locally.");
        }

        $files = glob($targetFolder . '/*'); // Get all file names in the folder
        foreach($files as $file) { // Iterate through each file
            if(is_file($file)) {
                unlink($file); // Delete the file
            }
        }

        $targetFolder = __DIR__.'/../../public/imagesResized';
        if (!is_dir($targetFolder)) {
            throw new \Exception("The 'imagesResized' folder does not exist locally.");
        }
        $files = glob($targetFolder . '/*'); // Get all file names in the folder
        foreach($files as $file) { // Iterate through each file
            if(is_file($file)) {
                unlink($file); // Delete the file
            }
        }

    }
}
