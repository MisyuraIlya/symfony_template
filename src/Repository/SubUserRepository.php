<?php

namespace App\Repository;

use App\Entity\SubUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @extends ServiceEntityRepository<SubUser>
 *
 * @implements PasswordUpgraderInterface<SubUser>
 *
 * @method SubUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method SubUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method SubUser[]    findAll()
 * @method SubUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubUserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SubUser::class);
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof SubUser) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $user::class));
        }

        $user->setPassword($newHashedPassword);
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }

    public function createSubUser(SubUser $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findOneByExtIdAndPhone(?string $userExtId, ?string $phone): ?SubUser
    {
        return $this->createQueryBuilder('s')
            ->where('s.extId = :val1')
            ->andWhere('s.phone = :val2')
            ->setParameter('val1', $userExtId)
            ->setParameter('val2', $phone)
            ->getQuery()
            ->getOneOrNullResult();
    }

//    /**
//     * @return SubUser[] Returns an array of SubUser objects
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

//    public function findOneBySomeField($value): ?SubUser
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
