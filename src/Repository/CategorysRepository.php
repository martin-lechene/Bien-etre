<?php

namespace App\Repository;

use App\Entity\Categorys;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method categorys|null find($id, $lockMode = null, $lockVersion = null)
 * @method categorys|null findOneBy(array $criteria, array $orderBy = null)
 * @method categorys[]    findAll()
 * @method categorys[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorysRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Categorys::class);
    }

    // /**
    //  * @return Categorys[] Returns an array of Categorys objects
    //  */
    public function findLatest()
    {
        return $this->createQueryBuilder('p')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Categorys[] Returns an array of PCategorys objects
     */
    public function findFromServices($id)
    {
        return $this->createQueryBuilder('p')
            ->where('categorys.id = '.$id)
            ->getQuery()
            ->getResult()
        ;
        // return $this->createQueryBuilder('p')
        //     ->select('')
        //     ->from('prestataires_categorie_de_services', 'p')
        //     ->where('p.categorie_de_services_id = '.$id)
        //     ->setMaxResults(3)
        //     ->getQuery()
        //     ->getResult()
        // ;
    }

    /**
     * @return Categorys[] Returns an array of Categorys objects
     */
    public function findFromForm($request)
    {
        $category = $request->request->get('category');
        $name = $request->request->get('name');
        return $this->createQueryBuilder('p')
            ->andWhere('p.name LIKE :name')
            ->setParameter('name', '%'.$name.'%')
            ->setMaxResults(20)
            ->getQuery()
            ->getResult()
        ;
    }
    
}
