<?php

namespace App\Repository;

use App\Entity\ModelMoto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ModelMoto>
 *
 * @method ModelMoto|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModelMoto|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModelMoto[]    findAll()
 * @method ModelMoto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModelMotoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModelMoto::class);
    }

//    /**
//     * @return ModelMoto[] Returns an array of ModelMoto objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ModelMoto
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
