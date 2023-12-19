<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Validator\Constraints as Assert;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add ('username', TextType::class, [
                'label' => 'Nom d\'utilisateur',
                'label_attr' => [
                    'class' => 'block text-sm font-bold'
                ],
                'attr' => [
                    'placeholder' => 'Entre votre nom d\'utilisateur',
                    'class' => 'mb-4 block p-2 w-full text-sm rounded'
                ] 
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'label_attr' => [
                    'class' => 'block text-sm font-bold'
                ],
                'attr' => [
                    'placeholder' => 'Entrer votre email',
                    'class' => 'mb-4 block p-2 w-full text-sm rounded'
                ]
            ])
            ->add('password', PasswordType::class, [
                'attr' => [
                    'class' => 'mb-4 block p-2 w-full text-sm rounded',
                ],
                'label' => 'Mot de passe',
                'label_attr' => [
                    'class' => 'block text-sm font-bold'
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit comporter au moins {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                    new Assert\Length(['min' => 2, 'max' => 180]) // Suppression de la contrainte PasswordStrength
                ]
            ])
            ->add('passwordConfirm', PasswordType::class, [
                'attr' => [
                    'class' => 'mb-4 block p-2 w-full text-sm rounded',
                ],
                'label' => 'Confirmer le mot de passe',
                'label_attr' => [
                    'class' => 'block text-sm font-bold'
                ],
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrer un mot de passe.',
                    ]),
                    new Assert\EqualTo([
                        'propertyPath' => 'password', // Assure que les deux champs de mot de passe correspondent
                        'message' => 'Les mots de passe ne correspondent pas.'
                    ]),
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
