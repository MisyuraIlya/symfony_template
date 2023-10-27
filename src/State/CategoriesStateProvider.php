<?php

namespace App\State;

use ApiPlatform\Doctrine\Orm\State\CollectionProvider;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\Repository\CategoryRepository;
use App\Repository\UserRepository;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\RequestStack;

class CategoriesStateProvider implements ProviderInterface
{
    public function __construct(
        private readonly RequestStack $requestStack,
        #[Autowire(service: CollectionProvider::class)] private ProviderInterface $collectionProvider,
        private readonly UserRepository $userRepository,
        private readonly CategoryRepository $categoryRepository
    )
    {}

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {

        $userExtId = $this->requestStack->getCurrentRequest()->get('userExtId');
        $isUserHaveMigvan = $this->userRepository->isUserHaveMigvan($userExtId);
        $search = $this->requestStack->getCurrentRequest()->get('search');
        if(!$isUserHaveMigvan){
            $userExtId = null; // if there no migvan then userExtId must be null to fetch all categories
        }
        $response = $this->categoryRepository->getCategoriesByMigvanAndSearch($userExtId,$search);
        return $response;
    }
}
