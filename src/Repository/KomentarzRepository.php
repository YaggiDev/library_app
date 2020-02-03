<?php

namespace App\Repository;

use App\Entity\Komentarz;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Komentarz|null find($id, $lockMode = null, $lockVersion = null)
 * @method Komentarz|null findOneBy(array $criteria, array $orderBy = null)
 * @method Komentarz[]    findAll()
 * @method Komentarz[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KomentarzRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Komentarz::class);
    }

    // /**
    //  * @return Komentarz[] Returns an array of Komentarz objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Komentarz
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
