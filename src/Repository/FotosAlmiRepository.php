<?php

namespace App\Repository;

use App\Entity\FotosAlmi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FotosAlmi>
 *
 * @method FotosAlmi|null find($id, $lockMode = null, $lockVersion = null)
 * @method FotosAlmi|null findOneBy(array $criteria, array $orderBy = null)
 * @method FotosAlmi[]    findAll()
 * @method FotosAlmi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FotosAlmiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FotosAlmi::class);
    }

    public function add(FotosAlmi $foto, bool $flush):void
    {
        $this->getEntityManager()->persist($foto);
        if ($flush){
            $this->getEntityManager()->flush();
        }
    }

    public function remove(FotosAlmi $foto, bool $flush):void
    {
        $this->getEntityManager()->remove($foto);
        if ($flush){
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return FotosAlmi[] Returns an array of FotosAlmi objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?FotosAlmi
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
