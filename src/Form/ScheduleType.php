<?php

namespace App\Form;

use App\Entity\Classroom;
use App\Entity\LessonType;
use App\Entity\Schedule;
use App\Entity\Teacher;
use App\Entity\Term;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScheduleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_start')
            ->add('date_end')
            ->add('week')
            ->add('weekday')
            ->add('lesson_num')
            ->add('lesson_title')
            ->add('reference')
            ->add('term', EntityType::class, [
                'class' => Term::class,
'choice_label' => 'id',
            ])
            ->add('teacher', EntityType::class, [
                'class' => Teacher::class,
'choice_label' => 'id',
            ])
            ->add('classroom', EntityType::class, [
                'class' => Classroom::class,
'choice_label' => 'id',
            ])
            ->add('lesson_type', EntityType::class, [
                'class' => LessonType::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Schedule::class,
        ]);
    }
}
