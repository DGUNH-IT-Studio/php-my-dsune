<?php

namespace App\Repository;

use App\Entity\EducationLevel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EducationLevel>
 *
 * @method EducationLevel|null find($id, $lockMode = null, $lockVersion = null)
 * @method EducationLevel|null findOneBy(array $criteria, array $orderBy = null)
 * @method EducationLevel[]    findAll()
 * @method EducationLevel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EducationLevelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EducationLevel::class);
    }

    public function list(): array
    {
        $educationLevels = array();
        foreach ($this->findAll() as $educationLevel)
        {
            $educationLevels[] = array(
                'id' => $educationLevel->getId(),
                'education_profile_name' => $educationLevel->getEducationLevelName()
            );
        }
        return $educationLevels;
    }

//    /**
//     * @return EducationLevel[] Returns an array of EducationLevel objects
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

//    public function findOneBySomeField($value): ?EducationLevel
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
