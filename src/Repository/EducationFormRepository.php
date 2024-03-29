<?php

namespace App\Repository;

use App\Entity\EducationForm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EducationForm>
 *
 * @method EducationForm|null find($id, $lockMode = null, $lockVersion = null)
 * @method EducationForm|null findOneBy(array $criteria, array $orderBy = null)
 * @method EducationForm[]    findAll()
 * @method EducationForm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EducationFormRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EducationForm::class);
    }

    public function list(): array
    {
        $educationForms = array();
        foreach ($this->findAll() as $educationForm)
        {
            $educationForms[] = array(
                'id' => $educationForm->getId(),
                'education_profile_name' => $educationForm->getEducationFormName()
            );
        }
        return $educationForms;
    }

//    /**
//     * @return EducationForm[] Returns an array of EducationForm objects
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

//    public function findOneBySomeField($value): ?EducationForm
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
