<?php

namespace App\State;

use ApiPlatform\Metadata\CollectionOperationInterface;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\Documents;
use App\Erp\ErpManager;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class DocumentsProvider implements ProviderInterface
{
    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly RequestStack $requestStack,
    )
    {
        $this->userExId = $this->requestStack->getCurrentRequest()->query->get('userExId');
        $this->fromDate = $this->requestStack->getCurrentRequest()->query->get('from');
        $this->toDate = $this->requestStack->getCurrentRequest()->query->get('to');
        $this->documentType = $this->requestStack->getCurrentRequest()->query->get('documentType');
        $this->limit = $this->requestStack->getCurrentRequest()->query->get('limit');
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {

        if ($operation instanceof CollectionOperationInterface) {
            return $this->CollectionHandler($operation,$uriVariables,$context);
        }
        return $this->GetHandler($operation,$uriVariables,$context);
    }

    private function CollectionHandler($operation,$uriVariables,$context)
    {
        $format = "Y-m-d";
        $dateFrom = \DateTimeImmutable::createFromFormat($format, $this->fromDate);
        $dateTo = \DateTimeImmutable::createFromFormat($format, $this->toDate);

        $response = (new ErpManager($this->httpClient))->GetDocuments(
            $this->userExId,
            $dateFrom,
            $dateTo,
            $this->documentType,
            $this->limit
        );

        return $response;

    }

    private function GetHandler($operation,$uriVariables,$context)
    {

        $response = (new ErpManager($this->httpClient))->GetDocumentsItem($uriVariables['documentNumber']);
        return $response;
    }

}
