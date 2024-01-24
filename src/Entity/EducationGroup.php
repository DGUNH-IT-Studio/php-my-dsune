<?php

namespace App\Entity;

use App\Repository\EducationGroupRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EducationGroupRepository::class)]
class EducationGroup
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?EducationProgram $education_program = null;

    #[ORM\Column]
    private ?int $course = null;

    #[ORM\Column]
    private ?int $num = null;

    #[ORM\Column(nullable: true)]
    private ?int $subnum = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEducationProgram(): ?EducationProgram
    {
        return $this->education_program;
    }

    public function setEducationProgram(?EducationProgram $education_program): static
    {
        $this->education_program = $education_program;

        return $this;
    }

    public function getCourse(): ?int
    {
        return $this->course;
    }

    public function setCourse(int $course): static
    {
        $this->course = $course;

        return $this;
    }

    public function getNum(): ?int
    {
        return $this->num;
    }

    public function setNum(int $num): static
    {
        $this->num = $num;

        return $this;
    }

    public function getSubnum(): ?int
    {
        return $this->subnum;
    }

    public function setSubnum(?int $subnum): static
    {
        $this->subnum = $subnum;

        return $this;
    }
}
