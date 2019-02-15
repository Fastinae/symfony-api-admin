<?php

namespace App\Repository;

use App\Entity\Booth;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Booth|null find($id, $lockMode = null, $lockVersion = null)
 * @method Booth|null findOneBy(array $criteria, array $orderBy = null)
 * @method Booth[]    findAll()
 * @method Booth[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BoothRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Booth::class);
    }

    // /**
    //  * @return Booth[] Returns an array of Booth objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Booth
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
