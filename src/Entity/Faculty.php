<?php

namespace App\Entity;

use App\Repository\FacultyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FacultyRepository::class)]
class Faculty
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $faculty_name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFacultyName(): ?string
    {
        return $this->faculty_name;
    }

    public function setFacultyName(string $faculty_name): static
    {
        $this->faculty_name = $faculty_name;

        return $this;
    }
}
