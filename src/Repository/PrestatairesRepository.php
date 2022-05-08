<?php

namespace App\Repository;

use App\Entity\Prestataires;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
    use Doctrine\Bundle\DoctrineBundle\Repository\PrestatairesEntityRepository;
/**
 * @method Prestataires|null find($id, $lockMode = null, $lockVersion = null)
 * @method Prestataires|null findOneBy(array $criteria, array $orderBy = null)
 * @method Prestataires[]    findAll()
 * @method Prestataires[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrestatairesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Prestataires::class);

    }
    
    public function findPrestatairesByName(string $query)
    {
        $qb = $this->createQueryBuilder('p');
        $qb
            ->where(
                $qb->expr()->andX(
                    $qb->expr()->orX(
                        $qb->expr()->like('p.name', ':query'),
                    ),
                )
            )
            ->setParameter('query', '%' . $query . '%')
        ;
        return $qb
            ->getQuery()
            ->getResult();
    }

    public function findPrestatairesByCity(string $query)
    {
        $qb = $this->createQueryBuilder('p');
        $qb
            ->where(
                $qb->expr()->andX(
                    $qb->expr()->orX(
                        $qb->expr()->like('p.nameCity', ':query'),
                        
                    ),
                )
            )
            ->setParameter('query', '%' . $query . '%')
        ;
        return $qb
            ->getQuery()
            ->getResult();
    }

    public function findPrestatairesByPostal(string $query)
    {
        $qb = $this->createQueryBuilder('p');
        $qb
            ->where(
                $qb->expr()->andX(
                    $qb->expr()->orX(
                        $qb->expr()->like('p.numPostal', ':query'),
                    ),
                )
            )
            ->setParameter('query', '%' . $query . '%')
        ;
        return $qb
            ->getQuery()
            ->getResult();
    }

    public function findPrestatairesByCategory(string $query)
    {
        $qb = $this->createQueryBuilder('p');
        $qb
            ->where(
                $qb->expr()->andX(
                    $qb->expr()->orX(
                        $qb->expr()->like('p.categoryService', ':query'),
                    ),
                    // $qb->expr()->isNotNull('p.created_at')
                )
            )
            ->setParameter('query', '%' . $query . '%')
        ;
        return $qb
            ->getQuery()
            ->getResult();
    }


    
    public function findByQuery(string $query_name, string $query_city, string $query_postal, string $query_category)
    {
        $qb = $this->createQueryBuilder('p');
        $qb
            ->where(
                $qb->expr()->andX(
                    $qb->expr()->orX(
                        $qb->expr()->like('p.name', ':query'),
                        $qb->expr()->like('p.nameCity', ':query'),
                        $qb->expr()->like('p.numPostal', ':query'),
                        $qb->expr()->like('p.categoryService', ':query'),
                    ),
                    // $qb->expr()->isNotNull('p.created_at')
                )
            )
            ->setParameter('query', '%' . $query_name . '%')
            ->setParameter('query', '%' . $query_city . '%')
            ->setParameter('query', '%' . $query_postal . '%')
            ->setParameter('query', '%' . $query_category . '%')
        ;
        return $qb
            ->getQuery()
            ->getResult();
    }


    
    // /**
    //  * @return Prestataires[] Returns an array of Prestataires objects
    //  */
    public function findLatest()
    {
        return $this->createQueryBuilder('p')
            ->setMaxResults(4)
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
            ->setMaxResults(3)
            // ->where('categorie_de_service.id = '.$id)
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
     * @return Prestataires[] Returns an array of Prestataires objects
     */
    public function findFromForm($request)
    {
        $categorie = $request->request->get('categorie');
        $nom = $request->request->get('nom');
        return $this->createQueryBuilder('p')
            ->andWhere('p.nom LIKE :nom')
            ->setParameter('nom', '%'.$nom.'%')
            ->setMaxResults(20)
            ->getQuery()
            ->getResult()
        ;
    }
    

    /*
    public function findOneBySomeField($value): ?Prestataires
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
