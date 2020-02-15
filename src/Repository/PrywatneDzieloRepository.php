<?php

namespace App\Repository;

use App\Entity\PrywatneDzielo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PrywatneDzielo|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrywatneDzielo|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrywatneDzielo[]    findAll()
 * @method PrywatneDzielo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrywatneDzieloRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PrywatneDzielo::class);
    }

    // /**
    //  * @return PrywatneDzielo[] Returns an array of PrywatneDzielo objects
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
    public function findOneBySomeField($value): ?PrywatneDzielo
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
