<?php

namespace App\Repository;

use App\Entity\ThrowDiceHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ThrowDiceHistory>
 *
 * @method ThrowDiceHistory|null find($id, $lockMode = null, $lockVersion = null)
 * @method ThrowDiceHistory|null findOneBy(array $criteria, array $orderBy = null)
 * @method ThrowDiceHistory[]    findAll()
 * @method ThrowDiceHistory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ThrowDiceHistoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ThrowDiceHistory::class);
    }

    public function add(ThrowDiceHistory $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ThrowDiceHistory $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ThrowDiceHistory[] Returns an array of ThrowDiceHistory objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ThrowDiceHistory
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
