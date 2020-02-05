<?php

namespace App\Repository;

use App\Entity\Wypozyczenie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Wypozyczenie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Wypozyczenie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Wypozyczenie[]    findAll()
 * @method Wypozyczenie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WypozyczenieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Wypozyczenie::class);
    }

    // /**
    //  * @return Wypozyczenie[] Returns an array of Wypozyczenie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Wypozyczenie
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
