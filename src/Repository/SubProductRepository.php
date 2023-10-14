<?php

namespace App\Repository;

use App\Entity\SubProduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SubProduct>
 *
 * @method SubProduct|null find($id, $lockMode = null, $lockVersion = null)
 * @method SubProduct|null findOneBy(array $criteria, array $orderBy = null)
 * @method SubProduct[]    findAll()
 * @method SubProduct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SubProduct::class);
    }

    public function createSubProduct(SubProduct $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findOneBySku(string $sku): ?SubProduct
    {
        return $this->createQueryBuilder('s')
            ->where('s.sku = :val1')
            ->setParameter('val1', $sku)
            ->getQuery()
            ->getOneOrNullResult();
    }
//    /**
//     * @return SubProduct[] Returns an array of SubProduct objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SubProduct
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
