<?php

namespace App\Repository;

use App\Entity\Cursos;
use Container41GVaDX\get_ServiceLocator_XUrKPVUService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cursos>
 *
 * @method Cursos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cursos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cursos[]    findAll()
 * @method Cursos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CursosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cursos::class);
    }

    public function add(Cursos $curso, bool $flush):void
    {
        $this->getEntityManager()->persist($curso);
        if ($flush){
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Cursos $curso, bool $flush):void
    {
        $this->getEntityManager()->remove($curso);
        if ($flush){
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Cursos[] Returns an array of Cursos objects
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

//    public function findOneBySomeField($value): ?Cursos
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
