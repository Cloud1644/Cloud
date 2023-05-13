<?php

namespace App\Repository;

use App\Entity\ImportOrderDetail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ImportOrderDetail>
 *
 * @method ImportOrderDetail|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImportOrderDetail|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImportOrderDetail[]    findAll()
 * @method ImportOrderDetail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImportOrderDetailRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImportOrderDetail::class);
    }

    public function add(ImportOrderDetail $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ImportOrderDetail $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
      /**
    * @return ImportOrderDetail[] Returns an array of ImportOrderDetail objects
    */
   public function fillOrderById($value): array
   {
    return $this->createQueryBuilder('detail')
     ->select('SUM(detailp.priceImport*detail.ImQuantity) As Total_Price') 
    ->innerJoin('detail.impro','detailp')
    ->innerJoin('detail.imorder','detaili')
    ->Where('detaili.id = :val')
    ->setParameter('val', $value)
    ->getQuery()
    ->getResult()
;
   }
       /**
    * @return ImportOrderDetail[] Returns an array of ImportOrderDetail objects
    */
    public function fillOrderById2($value): array
    {
     return $this->createQueryBuilder('detail')
      ->select('detail.id,detailp.name,detail.ImQuantity') 
     ->innerJoin('detail.impro','detailp')
     ->innerJoin('detail.imorder','detaili')
     ->Where('detaili.id = :val')
     ->setParameter('val', $value)
     ->getQuery()
     ->getResult()
 ;
    }

//    public function totalPrice(): array
//    {
//         $en= $this->getEntityManager()->getConnection();
//         $sql='
//         SELECT detail.id,p.name,SUM((p.price_import*detail.im_quantity)) as Total_Price
// FROM `import_order` i, `import_order_detail` detail, `product` p 
// WHERE i.id=detail.imorder_id AND detail.impro_id=p.id
//         ';
//     $stmt=$en->prepare($sql);
//     $re=$stmt->executeQuery();
//        return $re->fetchAllAssociative();
//    }


//    /**
//     * @return ImportOrderDetail[] Returns an array of ImportOrderDetail objects
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

//    public function findOneBySomeField($value): ?ImportOrderDetail
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
