<?php

namespace App\Repository;

use App\Entity\EducationProfile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EducationProfile>
 *
 * @method EducationProfile|null find($id, $lockMode = null, $lockVersion = null)
 * @method EducationProfile|null findOneBy(array $criteria, array $orderBy = null)
 * @method EducationProfile[]    findAll()
 * @method EducationProfile[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EducationProfileRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EducationProfile::class);
    }

    public function list(): array
    {
        $educationProfiles = array();
        foreach ($this->findAll() as $educationProfile)
        {
            $educationProfiles[] = array(
                'id' => $educationProfile->getId(),
                'education_profile_name' => $educationProfile->getEducationProfileName()
            );
        }
        return $educationProfiles;
    }

//    /**
//     * @return EducationProfile[] Returns an array of EducationProfile objects
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

//    public function findOneBySomeField($value): ?EducationProfile
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
