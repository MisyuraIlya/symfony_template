<?php

namespace App\Repository;

use App\Entity\Migvan;
use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use ApiPlatform\Doctrine\Orm\Paginator;
use Doctrine\ORM\Tools\Pagination\Paginator as DoctrinePaginator;

/**
 * @extends ServiceEntityRepository<Product>
 *
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    const ITEMS_PER_PAGE = 2;

    public function __construct(
        ManagerRegistry $registry,
        UserRepository $userRepository,
    )
    {
        $this->userRepository = $userRepository;
        parent::__construct($registry, Product::class);
    }

    public function createProduct(Product $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findOneBySku(string $sku): ?Product
    {
        return $this->createQueryBuilder('c')
            ->where('c.sku = :val1')
            ->setParameter('val1', $sku)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getCatalog(int $page = 1, string $userExtId = null, int $itemsPerPage = 24, int $lvl1, int $lvl2, int $lvl3, ?string $orderBy = null, ?string $attributes, ?string $searchValue): Paginator
    {

        $firstResult = ($page - 1) * $itemsPerPage;
        $queryBuilder = $this->_em->createQueryBuilder();
        $queryBuilder->select('p')
            ->from(Product::class, 'p')
            ->andWhere('p.isPublished = true');
        if ($userExtId) {
            $user = $this->userRepository->findOneByExtId($userExtId);
            $queryBuilder->join('p.migvans', 'm')
                ->where('m.user = :user')
                ->setParameter('user', $user);
        }

        if ($lvl1) {
            $queryBuilder->andWhere('p.categoryLvl1 = :lvl1')
                ->setParameter('lvl1', $lvl1);

            if ($lvl2) {
                $queryBuilder->andWhere('p.categoryLvl2 = :lvl2')
                    ->setParameter('lvl2', $lvl2);

                if ($lvl3) {
                    $queryBuilder->andWhere('p.categoryLvl3 = :lvl3')
                        ->setParameter('lvl3', $lvl3);
                }
            }
        }

        if (!empty($attributes)) {
            $attributes = explode(",", $attributes);
            $queryBuilder->join('p.productAttributes', 'pa');
            $attributeConditions = [];
            foreach ($attributes as $index => $attribute) {
                $attributeConditions[] = $queryBuilder->expr()->eq('pa.attributeSub', ":attribute$index");
                $queryBuilder->setParameter("attribute$index", $attribute);
            }
            $queryBuilder->andWhere(call_user_func_array([$queryBuilder->expr(), 'orX'], $attributeConditions));
        }

        if ($searchValue) {
            $queryBuilder->andWhere($queryBuilder->expr()->like('p.title', ':searchValue'));
            $queryBuilder->setParameter('searchValue', '%' . $searchValue . '%');
        }

        if($orderBy){
            $queryBuilder->orderBy("p.$orderBy", 'ASC');
        }

        $query = $queryBuilder->getQuery()
            ->setFirstResult($firstResult)
            ->setMaxResults($itemsPerPage);
        $doctrinePaginator = new DoctrinePaginator($query);
        $paginator = new Paginator($doctrinePaginator);

        return $paginator;
    }

}
