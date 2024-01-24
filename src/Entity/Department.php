<?php

namespace App\Entity;

use App\Repository\DepartmentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DepartmentRepository::class)]
class Department
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?Faculty $faculty = null;

    #[ORM\Column(length: 255)]
    private ?string $department_name = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDepartmentName(): ?string
    {
        return $this->department_name;
    }

    public function setDepartmentName(string $department_name): static
    {
        $this->department_name = $department_name;

        return $this;
    }
}
