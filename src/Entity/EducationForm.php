<?php

namespace App\Entity;

use App\Repository\EducationFormRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EducationFormRepository::class)]
class EducationForm
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $education_form_name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEducationFormName(): ?string
    {
        return $this->education_form_name;
    }

    public function setEducationFormName(string $education_form_name): static
    {
        $this->education_form_name = $education_form_name;

        return $this;
    }
}
