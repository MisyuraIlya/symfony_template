<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use App\State\DocumentsProvider;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\ApiProperty;

#[ApiResource(
    shortName: 'Documents',

    operations: [
        new GetCollection(
            uriTemplate: '/documents?userExId=41104111&from=2023-02-10&to=2023-03-10&documentType=orders&limit=10'
        ),
        new Get()
    ],
    provider: DocumentsProvider::class,
)]
class Documents
{
    public ?string $documentNumber;

    public function __construct(string $documentNumber)
    {
        $this->documentNumber = $documentNumber;
    }

    #[ApiProperty(identifier: true)]
    public function getDocumentNumber(): string
    {
        return $this->documentNumber;
    }
}