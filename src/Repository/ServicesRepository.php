<?php

namespace App\Repository;

use App\Entity\Services;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Services|null find($id, $lockMode = null, $lockVersion = null)
 * @method Services|null findOneBy(array $criteria, array $orderBy = null)
 * @method Services[]    findAll()
 * @method Services[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServicesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Services::class);
    }

    ///**
    //* @return Prestataires[] Returns an array of Prestataires objects
    //*/
    public function findLatest()
    {
        return $this->createQueryBuilder('p')
            ->getQuery()
            ->getResult()
        ;
    }
    /**
     * @return Prestataires[] Returns an array of Prestataires objects
     */
    public function findFromServices($id)
    {
        return $this->createQueryBuilder('p')
            ->where('prestataires.id = '.$id)
            ->getQuery()
            ->getResult()
        ;
        
    }
}
