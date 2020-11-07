<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Traduction;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TraductionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('wordToTranslate', WordToTranslateType::class, [
                'label'=>'Le mot à apprendre'
            ])
            ->add('wordTranslation', WordTranslationType::class, [
                'label' => 'Traduction '
            ])
            ->add('categorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'lbl',
                'label' => 'La catégorie '
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Traduction::class,
        ]);
    }
}
