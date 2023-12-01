<?php

namespace App\Repository;

use App\Entity\CategoryMoto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CategoryMoto>
 *
 * @method CategoryMoto|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryMoto|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryMoto[]    findAll()
 * @method CategoryMoto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryMotoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoryMoto::class);
    }

//    /**
//     * @return CategoryMoto[] Returns an array of CategoryMoto objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CategoryMoto
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
