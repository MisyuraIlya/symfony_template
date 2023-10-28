<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\ApiResource\XlxDocuments;
use App\Entity\Error;
use App\Repository\ErrorRepository;
use App\Service\FtpService;
use App\Service\XlxDocumentService;

class XlDocumentProcessor implements ProcessorInterface
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
            $pdfCreate = (new XlxDocumentService())->GetExcelOrder($data);
            $ftpUplaodFilePath = (new FtpService(
                $_ENV['VPS_1_FOLDER'],
                $_ENV['VPS_1_OUTPUT_FOLDER']
            ))->uploadFile($pdfCreate,$pdfCreate);
            $obj = new \stdClass();
            $obj->url = $ftpUplaodFilePath;
            return $obj;
        } catch (\Exception $exception) {
            $error = new Error();
            $error->setDescription($exception->getMessage());
            $error->setFunctionName('xl document processor ');
            $this->errorRepository->createError($error,true);
            $obj =  new \stdClass();
            $obj->error = $exception->getMessage();
            return $obj;
        }

    }
}
