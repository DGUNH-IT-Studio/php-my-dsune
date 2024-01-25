<?php

namespace App\Form;

use App\Entity\EducationForm;
use App\Entity\ScheduleRing;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScheduleRingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lesson_num')
            ->add('time_start')
            ->add('time_end')
            ->add('education_form', EntityType::class, [
                'class' => EducationForm::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ScheduleRing::class,
        ]);
    }
}
