<?php

namespace App\Repository\homepage;

use App\Entity\OwnerPresentation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OwnerPresentation>
 *
 * @method OwnerPresentation|null find($id, $lockMode = null, $lockVersion = null)
 * @method OwnerPresentation|null findOneBy(array $criteria, array $orderBy = null)
 * @method OwnerPresentation[]    findAll()
 * @method OwnerPresentation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OwnerPresentationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OwnerPresentation::class);
    }

//    /**
//     * @return OwnerPresentation[] Returns an array of OwnerPresentation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?OwnerPresentation
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
