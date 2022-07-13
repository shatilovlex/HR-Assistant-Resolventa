<?php

namespace App\Repository;

use App\Entity\GroupCompetence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GroupCompetence>
 *
 * @method GroupCompetence|null find($id, $lockMode = null, $lockVersion = null)
 * @method GroupCompetence|null findOneBy(array $criteria, array $orderBy = null)
 * @method GroupCompetence[]    findAll()
 * @method GroupCompetence[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GroupCompetenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GroupCompetence::class);
    }

    public function add(GroupCompetence $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(GroupCompetence $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
