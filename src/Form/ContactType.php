<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullName', TextType::class, [
                'attr' => [
                    'class' => 'mb-4 block p-2 w-full text-sm rounded form-input',
                    'minlength' => '2',
                    'maxlength' => '50',
                ],
                'label' => 'Nom / Prénom',
                'label_attr' => [
                    'class' => 'block text-sm font-bold'
                ],
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'mb-4 block p-2 w-full text-sm rounded form-input',
                    'placeholder' => 'nom@email.com'
                ],
                'label' => 'Adresse email',
                'label_attr' => [
                    'class' => 'block text-sm font-bold'
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Email(),
                    new Assert\Length(['min' => 2, 'max' => 180])
                ]

            ])
            ->add('subject', TextType::class, [
                'attr' => [
                    'class' => 'mb-4 block p-2 w-full text-sm rounded form-input',
                    'minlength' => '2',
                    'maxlength' => '100',
                    'placeholder' => 'Pourquoi nous contactes-tu ?'
                ],
                'label' => 'Sujet',
                'label_attr' => [
                    'class' => 'block text-sm font-bold'
                ],
                'constraints' => [
                    new Assert\Length(['min' => 2, 'max' => 100])
                ]
            ])

            ->add('message', TextareaType::class, [
                'attr' => ['rows' => 6, 'class' => 'mb-4 block p-2 w-full text-sm rounded-lg form-input-text', 'placeholder' => 'Écrit nous un message...'],
                'label' => 'Message',
                'label_attr' => [
                    'class' => 'block text-sm font-bold'
                ],
                'constraints' => [
                    new Assert\NotBlank()
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
