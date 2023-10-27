<?php

namespace App\Controller;

use ApiPlatform\Doctrine\Orm\Paginator;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpFoundation\Request;


#[AsController]
class GetProductsByMigvan
{
    public function __construct(

    )
    {
    }

    public function __invoke(Request $request, ProductRepository $bookRepository): Paginator
    {

        $lvl1 = (int) $request->attributes->get('lvl1');
        $lvl2 = (int) $request->attributes->get('lvl2');
        $lvl3 = (int) $request->attributes->get('lvl3');
        $orderBy = $request->query->get('orderBy');
        $userExtId = $request->query->get('userExtId');
        $page = (int) $request->query->get('page', 1);
        $itemsPerPage = (int) $request->query->get('itemsPerPage',24);
        $attributes = $request->query->get('attributes');
        $request->query->get('search');
        $searchValue = $request->query->get('search');
        return $bookRepository->getCatalog($page, $userExtId, $itemsPerPage, $lvl1, $lvl2, $lvl3, $orderBy, $attributes,$searchValue);


    }
}