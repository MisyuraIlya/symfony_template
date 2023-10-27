<?php

namespace App\State;

use ApiPlatform\Doctrine\Orm\Paginator;
use ApiPlatform\Doctrine\Orm\State\CollectionProvider;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\Repository\AttributeMainRepository;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\RequestStack;

class AttributeStateProvider implements ProviderInterface
{
    public function __construct(
        private readonly RequestStack $requestStack,
        private readonly AttributeMainRepository $attributeMainRepository,
        #[Autowire(service: CollectionProvider::class)] private ProviderInterface $collectionProvider,
    )
    {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        $lvl1 = $this->requestStack->getCurrentRequest()->attributes->get('lvl1');
        $lvl2 = $this->requestStack->getCurrentRequest()->attributes->get('lvl2');
        $lvl3 = $this->requestStack->getCurrentRequest()->attributes->get('lvl3');
        $response = $this->attributeMainRepository->findAttributesByCategoryExistProducts($lvl1,$lvl2,$lvl3);
        return $response;
    }
}
