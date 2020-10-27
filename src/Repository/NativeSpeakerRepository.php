<?php

namespace App\Repository;

use App\Entity\NativeSpeaker;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NativeSpeaker|null find($id, $lockMode = null, $lockVersion = null)
 * @method NativeSpeaker|null findOneBy(array $criteria, array $orderBy = null)
 * @method NativeSpeaker[]    findAll()
 * @method NativeSpeaker[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NativeSpeakerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NativeSpeaker::class);
    }

    // /**
    //  * @return NativeSpeaker[] Returns an array of NativeSpeaker objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NativeSpeaker
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
