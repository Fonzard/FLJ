<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullName', TextType::class, [
                'attr' => [
                    'class' => 'mb-4 block p-2 w-full text-sm rounded',
                    'minlenght' => '2',
                    'maxlenght' => '50',
                ],
                'label' => 'Nom / Prénom',
                'label_attr' => [
                    'class' => 'block text-sm font-bold'
                ],
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'mb-4 block p-2 w-full text-sm rounded',
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
                    'class' => 'mb-4 block p-2 w-full text-sm rounded',
                    'minlenght' => '2',
                    'maxlenght' => '100',
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
                'attr' => ['rows' => 6, 'class' => 'mb-4 block p-2 w-full text-sm rounded-lg', 'placeholder' => 'Écrit nous un message...'],
                'label' => 'Message',
                'label_attr' => [
                    'class' => 'block text-sm font-bold'
                ],
                'constraints' => [
                    new Assert\NotBlank()
                ]
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'text-center mb-4 bg-[#A5A3BF] hover:bg-[#8E8CAB] rounded-lg p-2 font-bold transition-transform duration-300 ease-in-out transform hover:scale-95 relative overflow-hidden shadow-md mx-auto my-auto cursor-pointer mb-10'
                ],
                'label' => 'Soumettre ma demande'
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
