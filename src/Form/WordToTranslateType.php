<?php

namespace App\Form;

use App\Entity\Gender;
use App\Entity\PartOfSpeech;
use App\Entity\Word;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WordToTranslateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //Create a word TO translation and translation in the same moment
        //included into TranslationForm
        $builder
            ->add('lbl', null,
            [
                 'label' => 'Mot : '
            ])
            ->add('definition', null,
            [
                'label' => 'Traduction'
            ])
            ->add('targetWord', WordTranslationType::class,
            [
                'label' => 'Traduction'
            ])
            ->add('gender', EntityType::class,
            [
                'class' => Gender::class,
                'choice_label' => 'lbl',
                'label' => 'Genre'
            ])
            ->add('partOfSpeech', EntityType::class,
            [
                'class' => PartOfSpeech::class,
                'choice_label' => 'lbl',
                'label' => 'Partie de discours'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Word::class,
        ]);
    }
}
