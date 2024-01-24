<?php

namespace App\Entity;

use App\Repository\EducationProfileRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EducationProfileRepository::class)]
class EducationProfile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $education_profile_name = null;

    #[ORM\ManyToOne]
    private ?Faculty $faculty = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEducationProfileName(): ?string
    {
        return $this->education_profile_name;
    }

    public function setEducationProfileName(string $education_profile_name): static
    {
        $this->education_profile_name = $education_profile_name;

        return $this;
    }

    public function getFaculty(): ?Faculty
    {
        return $this->faculty;
    }

    public function setFaculty(?Faculty $faculty): static
    {
        $this->faculty = $faculty;

        return $this;
    }
}
