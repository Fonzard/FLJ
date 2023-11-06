<?php

namespace App\Repository;

use App\Entity\PartnershipFormation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PartnershipFormation>
 *
 * @method PartnershipFormation|null find($id, $lockMode = null, $lockVersion = null)
 * @method PartnershipFormation|null findOneBy(array $criteria, array $orderBy = null)
 * @method PartnershipFormation[]    findAll()
 * @method PartnershipFormation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartnershipFormationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PartnershipFormation::class);
    }

//    /**
//     * @return PartnershipFormation[] Returns an array of PartnershipFormation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PartnershipFormation
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
