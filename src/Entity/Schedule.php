<?php

namespace App\Entity;

use App\Repository\ScheduleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScheduleRepository::class)]
class Schedule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?Term $term = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_start = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_end = null;

    #[ORM\Column]
    private ?int $week = null;

    #[ORM\Column]
    private ?int $weekday = null;

    #[ORM\Column(nullable: true)]
    private ?int $lesson_num = null;

    #[ORM\Column(length: 255)]
    private ?string $lesson_title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $reference = null;

    #[ORM\ManyToOne]
    private ?Teacher $teacher = null;

    #[ORM\ManyToOne]
    private ?Classroom $classroom = null;

    #[ORM\ManyToOne]
    private ?LessonType $lesson_type = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTerm(): ?Term
    {
        return $this->term;
    }

    public function setTerm(?Term $term): static
    {
        $this->term = $term;

        return $this;
    }

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->date_start;
    }

    public function setDateStart(?\DateTimeInterface $date_start): static
    {
        $this->date_start = $date_start;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->date_end;
    }

    public function setDateEnd(?\DateTimeInterface $date_end): static
    {
        $this->date_end = $date_end;

        return $this;
    }

    public function getWeek(): ?int
    {
        return $this->week;
    }

    public function setWeek(int $week): static
    {
        $this->week = $week;

        return $this;
    }

    public function getWeekday(): ?int
    {
        return $this->weekday;
    }

    public function setWeekday(int $weekday): static
    {
        $this->weekday = $weekday;

        return $this;
    }

    public function getLessonNum(): ?int
    {
        return $this->lesson_num;
    }

    public function setLessonNum(?int $lesson_num): static
    {
        $this->lesson_num = $lesson_num;

        return $this;
    }

    public function getLessonTitle(): ?string
    {
        return $this->lesson_title;
    }

    public function setLessonTitle(string $lesson_title): static
    {
        $this->lesson_title = $lesson_title;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): static
    {
        $this->reference = $reference;

        return $this;
    }

    public function getTeacher(): ?Teacher
    {
        return $this->teacher;
    }

    public function setTeacher(?Teacher $teacher): static
    {
        $this->teacher = $teacher;

        return $this;
    }

    public function getClassroom(): ?Classroom
    {
        return $this->classroom;
    }

    public function setClassroom(?Classroom $classroom): static
    {
        $this->classroom = $classroom;

        return $this;
    }

    public function getLessonType(): ?LessonType
    {
        return $this->lesson_type;
    }

    public function setLessonType(?LessonType $lesson_type): static
    {
        $this->lesson_type = $lesson_type;

        return $this;
    }
}
