<?php

namespace App\Repository;

use App\Entity\Dzielo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Dzielo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dzielo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dzielo[]    findAll()
 * @method Dzielo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DzieloRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dzielo::class);
    }
    public function ifContains($phrase)
    {
        return $this->_em->createQuery("SELECT * FROM 'App\Repository\DzieloRepository u WHERE u LIKE '%u%");
    }
    // /**
    //  * @return Dzielo[] Returns an array of Dzielo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Dzielo
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
