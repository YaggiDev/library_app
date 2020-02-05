<?php

namespace App\Repository;

use App\Entity\Polka;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Polka|null find($id, $lockMode = null, $lockVersion = null)
 * @method Polka|null findOneBy(array $criteria, array $orderBy = null)
 * @method Polka[]    findAll()
 * @method Polka[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PolkaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Polka::class);
    }

    // /**
    //  * @return Polka[] Returns an array of Polka objects
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
    public function findOneBySomeField($value): ?Polka
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
