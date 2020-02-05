<?php

namespace App\Repository;

use App\Entity\Autor_dzielo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Autor_dzielo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Autor_dzielo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Autor_dzielo[]    findAll()
 * @method Autor_dzielo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Autor_DzieloRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Autor_dzielo::class);
    }

    // /**
    //  * @return Autor_dzielo[] Returns an array of Autor_dzielo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Autor_dzielo
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
