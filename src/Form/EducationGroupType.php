<?php

namespace App\Form;

use App\Entity\EducationGroup;
use App\Entity\EducationProgram;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EducationGroupType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('course')
            ->add('num')
            ->add('subnum')
            ->add('education_program', EntityType::class, [
                'class' => EducationProgram::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EducationGroup::class,
        ]);
    }
}
