<?php

namespace App\Module\Greeting\Infrastructure\Persistence\Doctrine;

use App\Module\Greeting\Domain\Greeting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Greeting>
 *
 * @method Greeting|null find($id, $lockMode = null, $lockVersion = null)
 * @method Greeting|null findOneBy(array $criteria, array $orderBy = null)
 * @method Greeting[]    findAll()
 * @method Greeting[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GreetingDoctrineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Greeting::class);
    }

    public function save(Greeting $greeting): void
    {
        $this->getEntityManager()->persist($greeting);
        $this->getEntityManager()->flush();
    }

    //    /**
    //     * @return Greeting[] Returns an array of Greeting objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('g')
    //            ->andWhere('g.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('g.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Greeting
    //    {
    //        return $this->createQueryBuilder('g')
    //            ->andWhere('g.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
