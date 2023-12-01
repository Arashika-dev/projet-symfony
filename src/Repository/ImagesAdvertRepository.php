<?php

namespace App\Repository;

use App\Entity\ImagesAdvert;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ImagesAdvert>
 *
 * @method ImagesAdvert|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImagesAdvert|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImagesAdvert[]    findAll()
 * @method ImagesAdvert[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImagesAdvertRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImagesAdvert::class);
    }

//    /**
//     * @return ImagesAdvert[] Returns an array of ImagesAdvert objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ImagesAdvert
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
