<?php

namespace App\Entity;

use App\Repository\EducationLevelRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EducationLevelRepository::class)]
class EducationLevel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $education_level_name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEducationLevelName(): ?string
    {
        return $this->education_level_name;
    }

    public function setEducationLevelName(string $education_level_name): static
    {
        $this->education_level_name = $education_level_name;

        return $this;
    }
}
