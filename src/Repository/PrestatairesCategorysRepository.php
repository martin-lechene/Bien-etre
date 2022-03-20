<?php

namespace App\Repository;

use App\Entity\PrestatairesCategorys;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PrestatairesCategorys|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrestatairesCategorys|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrestatairesCategorys[]    findAll()
 * @method PrestatairesCategorys[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrestatairesCategorysRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PrestatairesCategorys::class);
    }

    // /**
    //  * @return PrestatairesCategorys[] Returns an array of PrestatairesCategorys objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PrestatairesCategorys
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
