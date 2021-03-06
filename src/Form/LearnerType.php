<?php

namespace App\Form;

use App\Entity\Langue;
use App\Entity\Learner;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LearnerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('langToLearn', EntityType::class,
        [
            'class' => Langue::class,
            'choice_label' => 'lbl',
            'label' => 'Langue que vous apprenez'
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Learner::class,
        ]);
    }
}
