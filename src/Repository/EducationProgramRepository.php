<?php

namespace App\Repository;

use App\Entity\EducationProgram;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EducationProgram>
 *
 * @method EducationProgram|null find($id, $lockMode = null, $lockVersion = null)
 * @method EducationProgram|null findOneBy(array $criteria, array $orderBy = null)
 * @method EducationProgram[]    findAll()
 * @method EducationProgram[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EducationProgramRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EducationProgram::class);
    }

    public function list(): array
    {
        $educationPrograms = array();
        foreach ($this->findAll() as $educationProgram)
        {
            $educationPrograms[] = array(
                'id' => $educationProgram->getId(),
                'education_program_name' => $educationProgram->getEducationProgramName()
            );
        }
        return $educationPrograms;
    }

    public function search(int $educationLevelID, int $educationFormID, int $educationProfileID)
    {
        $queryResult = $this->findBy(
            criteria: array(
                'education_profile' => $educationProfileID,
                'education_form' => $educationFormID,
                'education_level' => $educationLevelID
            )
        );
        
        if ($queryResult === []) {
            return null;
        } else {
            $educationPrograms = array();

            foreach ($queryResult as $educationProgram)
            {
                $educationPrograms[] = array(
                    'id' => $educationProgram->getId(),
                    'education_program_name' => $educationProgram->getEducationProgramName()
                );
            }

            return $educationPrograms;
        }
    }

//    /**
//     * @return EducationProgram[] Returns an array of EducationProgram objects
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

//    public function findOneBySomeField($value): ?EducationProgram
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
        //    ->getQuery()
        //    ->getOneOrNullResult()
//        ;
//    }
}
