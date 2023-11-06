<?php

namespace App\Repository;

use App\Entity\FormationContent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FormationContent>
 *
 * @method FormationContent|null find($id, $lockMode = null, $lockVersion = null)
 * @method FormationContent|null findOneBy(array $criteria, array $orderBy = null)
 * @method FormationContent[]    findAll()
 * @method FormationContent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormationContentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FormationContent::class);
    }

//    /**
//     * @return FormationContent[] Returns an array of FormationContent objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?FormationContent
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
