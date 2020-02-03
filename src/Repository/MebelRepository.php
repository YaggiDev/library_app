<?php

namespace App\Repository;

use App\Entity\Mebel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Mebel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mebel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mebel[]    findAll()
 * @method Mebel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MebelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mebel::class);
    }

    // /**
    //  * @return Mebel[] Returns an array of Mebel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Mebel
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
