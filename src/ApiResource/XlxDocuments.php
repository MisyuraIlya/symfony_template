<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Post;
use App\ApiResource\Dto\CartDto;
use App\ApiResource\Dto\XlxDocumentsDto;
use App\State\PdfDocumentProcessor;
use App\State\XlDocumentProcessor;

#[ApiResource(
    shortName: 'doc/xl',
    operations: [new Post()],
    processor: XlDocumentProcessor::class
)]
#[ApiResource(
    shortName: 'doc/pdf',
    operations: [new Post()],
    processor: PdfDocumentProcessor::class
)]
class XlxDocuments
{
    public ?string $documentNumber;

    public ?string $userExtId;

    public ?string $documentType;

    public ?XlxDocumentsDto $erpData;

    public function __construct(string $documentNumber)
    {
        $this->documentNumber = $documentNumber;
    }

    #[ApiProperty(identifier: true)]
    public function getDocumentNumber(): string
    {
        return $this->documentNumber;
    }

    /**
     * @return string|null
     */
    public function getUserExtId(): ?string
    {
        return $this->userExtId;
    }

    /**
     * @param string|null $userExtId
     */
    public function setUserExtId(?string $userExtId): void
    {
        $this->userExtId = $userExtId;
    }

    /**
     * @return string|null
     */
    public function getDocumentType(): ?string
    {
        return $this->documentType;
    }

    /**
     * @param string|null $documentType
     */
    public function setDocumentType(?string $documentType): void
    {
        $this->documentType = $documentType;
    }

    /**
     * @return XlxDocumentsDto|null
     */
    public function getErpData(): ?XlxDocumentsDto
    {
        return $this->erpData;
    }

    /**
     * @param XlxDocumentsDto|null $erpData
     */
    public function setErpData(?XlxDocumentsDto $erpData): void
    {
        $this->erpData = $erpData;
    }






}