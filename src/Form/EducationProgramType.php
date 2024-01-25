<?php

namespace App\Form;

use App\Entity\EducationForm;
use App\Entity\EducationLevel;
use App\Entity\EducationProfile;
use App\Entity\EducationProgram;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EducationProgramType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('education_program_name')
            ->add('education_level', EntityType::class, [
                'class' => EducationLevel::class,
'choice_label' => 'id',
            ])
            ->add('education_form', EntityType::class, [
                'class' => EducationForm::class,
'choice_label' => 'id',
            ])
            ->add('education_profile', EntityType::class, [
                'class' => EducationProfile::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EducationProgram::class,
        ]);
    }
}
