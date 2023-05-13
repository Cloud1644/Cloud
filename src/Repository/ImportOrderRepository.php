<?php

namespace App\Repository;

use App\Entity\ImportOrder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ImportOrder>
 *
 * @method ImportOrder|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImportOrder|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImportOrder[]    findAll()
 * @method ImportOrder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImportOrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImportOrder::class);
    }

    public function add(ImportOrder $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ImportOrder $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

       /**
    * @return ImportOrder[] Returns an array of ImportOrder objects
    */
   public function showImport($value): array
   {
    // SELECT i.id,u.id,i.time 
    // FROM `import_order` i,`user` u 
    // WHERE i.im_user_id=u.id
       return $this->createQueryBuilder('i')
           ->select('i.id As ImportID,u.id As UserID ,i.time')
           ->innerJoin('i.ImUser','u')
        //     ->Where('i.id = :val')
        //    ->setParameter('val', $value)
           ->getQuery()
           ->getResult()
       ;
   }






//    /**
//     * @return ImportOrder[] Returns an array of ImportOrder objects
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

//    public function findOneBySomeField($value): ?ImportOrder
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
