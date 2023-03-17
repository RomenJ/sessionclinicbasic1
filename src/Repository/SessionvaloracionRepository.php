<?php

namespace App\Repository;

use App\Entity\Sessionvaloracion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Sessionvaloracion>
 *
 * @method Sessionvaloracion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sessionvaloracion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sessionvaloracion[]    findAll()
 * @method Sessionvaloracion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SessionvaloracionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sessionvaloracion::class);
    }

    public function save(Sessionvaloracion $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Sessionvaloracion $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Sessionvaloracion[] Returns an array of Sessionvaloracion objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Sessionvaloracion
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
