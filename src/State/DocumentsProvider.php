<?php

namespace App\State;

use ApiPlatform\Metadata\CollectionOperationInterface;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\Documents;
use App\Enum\DocumentsType;
use App\Erp\ErpManager;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use ApiPlatform\State\Pagination\TraversablePaginator;
use ApiPlatform\State\Pagination\Pagination;

class DocumentsProvider implements ProviderInterface
{
    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly RequestStack $requestStack,
        private Pagination $pagination,
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
            $currentPage = $this->pagination->getPage($context);
            $itemsPerPage = $this->pagination->getLimit($operation, $context);
            $offset = $this->pagination->getOffset($operation, $context);

            $result = $this->CollectionHandler($operation,$uriVariables,$context);
            $totalItems = count($result->documents);
            $start = ($currentPage - 1) * $itemsPerPage;
            $slicedResult = array_slice($result->documents, $start, $itemsPerPage);
            return new TraversablePaginator(
                new \ArrayIterator($slicedResult),
                $currentPage,
                $itemsPerPage,
                $totalItems,
            );
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

//        $response->selectBox = DocumentsType::getAllDetails();

        return $response;

    }

    private function GetHandler($operation,$uriVariables,$context)
    {

        $response = (new ErpManager($this->httpClient))->GetDocumentsItem($uriVariables['documentNumber']);
        return $response;
    }

}
