<?php

namespace App\Repository\homepage;

use App\Entity\CustomMadeFormation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CustomMadeFormation>
 *
 * @method CustomMadeFormation|null find($id, $lockMode = null, $lockVersion = null)
 * @method CustomMadeFormation|null findOneBy(array $criteria, array $orderBy = null)
 * @method CustomMadeFormation[]    findAll()
 * @method CustomMadeFormation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomMadeFormationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CustomMadeFormation::class);
    }

//    /**
//     * @return CustomMadeFormation[] Returns an array of CustomMadeFormation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CustomMadeFormation
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
