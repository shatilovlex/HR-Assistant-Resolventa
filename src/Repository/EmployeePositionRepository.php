<?php

namespace App\Repository;

use App\Entity\EmployeePosition;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EmployeePosition>
 *
 * @method EmployeePosition|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmployeePosition|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmployeePosition[]    findAll()
 * @method EmployeePosition[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployeePositionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmployeePosition::class);
    }

    public function add(EmployeePosition $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(EmployeePosition $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
