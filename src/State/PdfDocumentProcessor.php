<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\ApiResource\XlxDocuments;
use App\Entity\Error;
use App\Repository\ErrorRepository;
use App\Service\FtpService;
use App\Service\XlxDocumentService;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class PdfDocumentProcessor implements ProcessorInterface
{
    public function __construct(
        private readonly ErrorRepository $errorRepository,
    )
    {
    }

    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = [])
    {

        try {
            assert($data instanceof XlxDocuments);
            $pdfCreate = (new XlxDocumentService())->GetPdfOrder($data);
            $ftpUplaodFilePath = (new FtpService(
                $_ENV['VPS_1_FOLDER'],
                $_ENV['VPS_1_OUTPUT_FOLDER']
            ))->uploadFile($pdfCreate,$pdfCreate);
            $obj = new \stdClass();
            $obj->url = $ftpUplaodFilePath;
            return $obj;
        } catch (\Throwable $exception) {
            $error = new Error();
            $error->setDescription($exception->getMessage());
            $error->setFunctionName('pdf document processor state');
            $this->errorRepository->createError($error,true);
            $obj =  new \stdClass();
            $obj->error = $exception->getMessage();
            return $obj;
        }

    }

}
