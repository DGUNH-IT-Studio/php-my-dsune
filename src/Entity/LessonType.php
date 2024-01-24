<?php

namespace App\Entity;

use App\Repository\LessonTypeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LessonTypeRepository::class)]
class LessonType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $lesson_type_name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLessonTypeName(): ?string
    {
        return $this->lesson_type_name;
    }

    public function setLessonTypeName(string $lesson_type_name): static
    {
        $this->lesson_type_name = $lesson_type_name;

        return $this;
    }
}
