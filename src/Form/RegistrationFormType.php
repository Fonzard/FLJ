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
use Symfony\Component\Validator\Context\ExecutionContextInterface;

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
                    'class' => 'mb-4 block p-2 w-full text-sm rounded form-input'
                ] 
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'label_attr' => [
                    'class' => 'block text-sm font-bold'
                ],
                'attr' => [
                    'placeholder' => 'Entrer votre email',
                    'class' => 'mb-4 block p-2 w-full text-sm rounded form-input'
                ]
            ])
            ->add('password', PasswordType::class, $this->getPasswordFieldOptions('Mot de passe'))
            ->add('passwordConfirm', PasswordType::class, $this->getPasswordFieldOptions('Confirmer le mot de passe', true));
    }
    private function getPasswordFieldOptions(string $label, bool $confirmField = false): array
    {
        $options = [
            'attr' => [
                'class' => 'mb-4 block p-2 w-full text-sm rounded form-input',
            ],
            'label' => $label,
            'label_attr' => [
                'class' => 'block text-sm font-bold',
            ],
            'constraints' => [
                new Assert\NotBlank([
                    'message' => 'Le mot de passe ne peut pas être vide.',
                ]),
                new Assert\Length([
                    'min' => 6,
                    'minMessage' => 'Votre mot de passe doit comporter au moins {{ limit }} caractères.',
                    // max length allowed by Symfony for security reasons
                    'max' => 4096,
                ]),
            ],
        ];

        if ($confirmField) {
            $options['mapped'] = false;
            $options['constraints'][] = new Assert\Callback([$this, 'validatePasswordConfirmation']);
        }

        return $options;
    }
    public function validatePasswordConfirmation($value, ExecutionContextInterface $context): void
    {
        $formData = $context->getRoot()->getData();

        if ($formData instanceof \App\Entity\User) {
            $password = $formData->getPassword();

            if ($value !== $password) {
                $context->buildViolation('Les mots de passe ne correspondent pas.')
                    ->atPath('passwordConfirm')
                    ->addViolation();
            }
        }
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
