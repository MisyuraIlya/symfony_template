<?php

namespace App\Repository;

use App\Entity\AttributeMain;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AttributeMain>
 *
 * @method AttributeMain|null find($id, $lockMode = null, $lockVersion = null)
 * @method AttributeMain|null findOneBy(array $criteria, array $orderBy = null)
 * @method AttributeMain[]    findAll()
 * @method AttributeMain[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AttributeMainRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AttributeMain::class);
    }

    public function createAttributeMain(AttributeMain $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findOneByExtId(string $extId): ?AttributeMain
    {
        return $this->createQueryBuilder('a')
            ->where('a.extId = :val1')
            ->setParameter('val1', $extId)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findOneByExtIdAndTitle(?string $extId, ?string $title): ?AttributeMain
    {
        return $this->createQueryBuilder('a')
            ->where('a.extId = :val1')
            ->where('a.title = :val2')
            ->setParameter('val1', $extId)
            ->setParameter('val2', $title)
            ->getQuery()
            ->getOneOrNullResult();
    }

//    /**
//     * @return AttributeMain[] Returns an array of AttributeMain objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AttributeMain
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
