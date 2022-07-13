<?php

namespace App\Repository;

use App\Entity\ExpectationLevel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExpectationLevel>
 *
 * @method ExpectationLevel|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExpectationLevel|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExpectationLevel[]    findAll()
 * @method ExpectationLevel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExpectationLevelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExpectationLevel::class);
    }

    public function add(ExpectationLevel $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ExpectationLevel $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
