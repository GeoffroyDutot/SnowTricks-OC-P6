<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'attr' => [
                    'class' => 'form-control border border-gray-300 text-gray-900 rounded hover:shadow focus:outline-none focus:bg-gray-100 focus:bg-opacity-50 focus:border-gray-400 py-2 px-4',
                    'placeholder' => 'Username'
                ],
                'empty_data' => '',
                'required' => true
            ])
            ->add('plainPassword', PasswordType::class, [
                'label' => 'Password',
                'attr' => [
                    'class' => 'form-control border border-gray-300 text-gray-900 rounded hover:shadow focus:outline-none focus:bg-gray-100 focus:bg-opacity-50 focus:border-gray-400 py-2 px-4',
                    'placeholder' => 'P@ssw0rd'
                ],
                'mapped' => false,
                'empty_data' => '',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a valid password'
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should have more than {{ limit }} characters',
                        'max' => 4096
                    ])
                ],
                'required' => true
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control border border-gray-300 text-gray-900 rounded hover:shadow focus:outline-none focus:bg-gray-100 focus:bg-opacity-50 focus:border-gray-400 py-2 px-4',
                    'placeholder' => 'email@gmail.com'
                ]
            ])
            ->add('profilePicture',  FileType::class, [
                'attr' => [
                    'class' => 'form-control border border-gray-300 text-gray-900 rounded hover:shadow focus:outline-none focus:bg-gray-100 focus:bg-opacity-50 focus:border-gray-400 py-2 px-4'
                ],
                'required' => false,
                'data_class' => null
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class
        ]);
    }
}
