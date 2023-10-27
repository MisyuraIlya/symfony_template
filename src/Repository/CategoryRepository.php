<?php

namespace App\Repository;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Category>
 *
 * @method Category|null find($id, $lockMode = null, $lockVersion = null)
 * @method Category|null findOneBy(array $criteria, array $orderBy = null)
 * @method Category[]    findAll()
 * @method Category[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryRepository extends ServiceEntityRepository
{
    public function __construct(
        ManagerRegistry $registry,
        UserRepository $userRepository,
    )
    {
        $this->userRepository = $userRepository;
        parent::__construct($registry, Category::class);
    }

    public function createCategory(Category $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findOneByExtId(?string $extId): ?Category
    {
        return $this->createQueryBuilder('c')
            ->where('c.extId = :val1')
            ->setParameter('val1', $extId)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getCategoriesByMigvanAndSearch(?string $userExtId,?string $searchValue)
    {
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
        if ($searchValue) {
            $queryBuilder->andWhere($queryBuilder->expr()->like('p.title', ':searchValue'));
            $queryBuilder->setParameter('searchValue', '%' . $searchValue . '%');
        }

        $products = $queryBuilder->getQuery()->getResult();
        $prods = [];
        $categoriesLvl2 = [];
        $categoriesLvl3 = [];
        foreach ($products as $product) {
            assert($product instanceof Product);
            if($product->getCategoryLvl2()){
                $categoriesLvl2[] = $product->getCategoryLvl2()->getId();
            }
            if($product->getCategoryLvl3()){
                $categoriesLvl3[] = $product->getCategoryLvl3()->getId();
            }
            $prods[] = $product->getId();
        }
        $qb = $this->createQueryBuilder('c');
        $qb->join('c.productsLvl1', 'p')
            ->where($qb->expr()->in('p.id', ':productIds'))
            ->setParameter('productIds', $prods);

        $result =  $qb->getQuery()->getResult();
        foreach ($result as $itemRec){
            assert($itemRec instanceof Category);
            $newCat2 = [];
            foreach ($itemRec->getCategories()->toArray() as $subCat) {
                assert($subCat instanceof Category);
                $newCat3 = [];
                if(in_array($subCat->getId(), $categoriesLvl2)){
                    $newCat2[] = $subCat;
                    foreach ($subCat->getCategories() as $subCat3) {
                        assert($subCat3 instanceof Category);
                        if(in_array($subCat3->getId(), $categoriesLvl3)){
                            $newCat3[] = $subCat3;
                            $subCat->removeCategory($subCat3);
                        }
                    }
                }
                $itemRec->removeCategory($subCat);
                $subCat->setCategories($newCat3);
            }
            $itemRec->setCategories($newCat2);
        }


        return $result;
    }

}
