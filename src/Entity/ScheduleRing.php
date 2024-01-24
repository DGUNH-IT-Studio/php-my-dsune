<?php

namespace App\Entity;

use App\Repository\ScheduleRingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScheduleRingRepository::class)]
class ScheduleRing
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?EducationForm $education_form = null;

    #[ORM\Column]
    private ?int $lesson_num = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $time_start = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $time_end = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLessonNum(): ?int
    {
        return $this->lesson_num;
    }

    public function setLessonNum(int $lesson_num): static
    {
        $this->lesson_num = $lesson_num;

        return $this;
    }

    public function getTimeStart(): ?\DateTimeInterface
    {
        return $this->time_start;
    }

    public function setTimeStart(?\DateTimeInterface $time_start): static
    {
        $this->time_start = $time_start;

        return $this;
    }

    public function getTimeEnd(): ?\DateTimeInterface
    {
        return $this->time_end;
    }

    public function setTimeEnd(?\DateTimeInterface $time_end): static
    {
        $this->time_end = $time_end;

        return $this;
    }
}
