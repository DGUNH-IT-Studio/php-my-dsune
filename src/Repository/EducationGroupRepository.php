<?php

namespace App\Repository;

use App\Entity\EducationGroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EducationGroup>
 *
 * @method EducationGroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method EducationGroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method EducationGroup[]    findAll()
 * @method EducationGroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EducationGroupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EducationGroup::class);
    }

    public function list(): array
    {
        $educationPrograms = array();

        foreach ($this->findAll() as $educationProgram)
        {
            $educationPrograms[] = array(
                'id' => $educationProgram->getId(),
                'education_program_id' => $educationProgram->getEducationProgram()->getId(),
                'course' => $educationProgram->getCourse(),
                'num' => $educationProgram->getNum(),
                'subnum' => $educationProgram->getSubnum()
            );
        }

        return $educationPrograms;
    }

    public function search($educationProgramID, $course, $groupNum, $groupSubNum)
    {
        $result = $this->findOneBy(
            criteria: array(
                'education_program' => $educationProgramID,
                'course' => $course,
                'num' => $groupNum,
                'subnum' => $groupSubNum
            )
        );
        return array(
            'id'=>$result->getId(),
            'education_program_id' => $result->getEducationProgram()->getId(),
            'course' => $result->getCourse(),
            'num' => $result->getNum(),
            'subnum' => $result->getSubnum()
        );
    }

//    /**
//     * @return EducationGroup[] Returns an array of EducationGroup objects
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

//    public function findOneBySomeField($value): ?EducationGroup
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
