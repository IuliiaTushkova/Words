<?php

namespace App\Form;

use App\Entity\Gender;
use App\Entity\Langue;
use App\Entity\PartOfSpeech;
use App\Entity\Word;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WordTranslationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lbl')
            ->add('definition')
            ->add('targetWord')
            ->add('translation')
            ->add('langue', EntityType::class,
            [
                'class' => Langue::class,
                'choice_label' => 'lbl'
            ]
            )
            ->add('gender', EntityType::class,
            [
                'class' => Gender::class,
                'choice_label' => 'lbl'
            ])
            ->add('partOfSpeech', EntityType::class,
                [
                    'class' => PartOfSpeech::class,
                    'choice_label' => 'lbl'
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Word::class,
        ]);
    }
}
