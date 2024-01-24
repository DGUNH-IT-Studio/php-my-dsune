<?php

namespace App\Entity;

use App\Repository\EducationProgramRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EducationProgramRepository::class)]
class EducationProgram
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $education_program_name = null;

    #[ORM\ManyToOne]
    private ?EducationLevel $education_level = null;

    #[ORM\ManyToOne]
    private ?EducationForm $education_form = null;

    #[ORM\ManyToOne]
    private ?EducationProfile $education_profile = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEducationProgramName(): ?string
    {
        return $this->education_program_name;
    }

    public function setEducationProgramName(string $education_program_name): static
    {
        $this->education_program_name = $education_program_name;

        return $this;
    }

    public function getEducationLevel(): ?EducationLevel
    {
        return $this->education_level;
    }

    public function setEducationLevel(?EducationLevel $education_level): static
    {
        $this->education_level = $education_level;

        return $this;
    }

    public function getEducationForm(): ?EducationForm
    {
        return $this->education_form;
    }

    public function setEducationForm(?EducationForm $education_form): static
    {
        $this->education_form = $education_form;

        return $this;
    }

    public function getEducationProfile(): ?EducationProfile
    {
        return $this->education_profile;
    }

    public function setEducationProfile(?EducationProfile $education_profile): static
    {
        $this->education_profile = $education_profile;

        return $this;
    }
}
