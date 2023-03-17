<?php

namespace App\Repository;

use App\Entity\Patologiadetectada;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Patologiadetectada>
 *
 * @method Patologiadetectada|null find($id, $lockMode = null, $lockVersion = null)
 * @method Patologiadetectada|null findOneBy(array $criteria, array $orderBy = null)
 * @method Patologiadetectada[]    findAll()
 * @method Patologiadetectada[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PatologiadetectadaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Patologiadetectada::class);
    }

    public function save(Patologiadetectada $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Patologiadetectada $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Patologiadetectada[] Returns an array of Patologiadetectada objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Patologiadetectada
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
