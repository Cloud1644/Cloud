<?php

namespace App\Repository;

use App\Entity\ExportOrderDetail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExportOrderDetail>
 *
 * @method ExportOrderDetail|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExportOrderDetail|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExportOrderDetail[]    findAll()
 * @method ExportOrderDetail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExportOrderDetailRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExportOrderDetail::class);
    }

    public function add(ExportOrderDetail $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ExportOrderDetail $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    
       /**
    * @return ExportOrderDetail[] Returns an array of ImportOrderDetail objects
    */
   public function fillOrderByIdEx1($value): array
   {
    return $this->createQueryBuilder('detail')
     ->select('SUM(detailp.priceExport*detail.ExQuantity) As Total_Price') 
    ->innerJoin('detail.expro','detailp')
    ->innerJoin('detail.exorder','detaili')
    ->Where('detaili.id = :val')
    ->setParameter('val', $value)
    ->getQuery()
    ->getResult()
;
   }
       /**
    * @return ExportOrderDetail[] Returns an array of ImportOrderDetail objects
    */
    public function fillOrderByIdEx2($value): array
    {
     return $this->createQueryBuilder('detail')
      ->select('detail.id,detailp.name,detail.ExQuantity') 
     ->innerJoin('detail.expro','detailp')
     ->innerJoin('detail.exorder','detaili')
     ->Where('detaili.id = :val')
     ->setParameter('val', $value)
     ->getQuery()
     ->getResult()
 ;
    }

     


//    /**
//     * @return ExportOrderDetail[] Returns an array of ExportOrderDetail objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ExportOrderDetail
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
