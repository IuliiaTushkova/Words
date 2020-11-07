<?php

namespace App\Repository;

use App\Entity\PartOfSpeech;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PartOfSpeech|null find($id, $lockMode = null, $lockVersion = null)
 * @method PartOfSpeech|null findOneBy(array $criteria, array $orderBy = null)
 * @method PartOfSpeech[]    findAll()
 * @method PartOfSpeech[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartOfSpeechRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PartOfSpeech::class);
    }

    // /**
    //  * @return PartOfSpeech[] Returns an array of PartOfSpeech objects
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
    public function findOneBySomeField($value): ?PartOfSpeech
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
