<?php

namespace App\Form;

use App\Entity\Langue;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class AccountCreationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('password', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('pseudo', null, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Quel est ton pseudo ?'
                    ])
                ]
            ])
            ->add('motherTongue', EntityType::class,
            [
                'class' => Langue::class,
                'choice_label' => 'lbl',
                'label' => 'Langue maternelle'
            ]
            )
            ->add('targetLangue', EntityType::class,
            [
                'class' => Langue::class,
                'choice_label' => 'lbl',
                'label' => 'Langue d\'apprentissage '
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Créer ton compte'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
