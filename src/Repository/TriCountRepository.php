<?php

namespace App\Repository;

use App\Entity\TriCount;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TriCount|null find($id, $lockMode = null, $lockVersion = null)
 * @method TriCount|null findOneBy(array $criteria, array $orderBy = null)
 * @method TriCount[]    findAll()
 * @method TriCount[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TriCountRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TriCount::class);
    }

    // /**
    //  * @return TriCount[] Returns an array of TriCount objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TriCount
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
