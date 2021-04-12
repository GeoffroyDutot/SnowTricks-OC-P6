<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Trick;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrickFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => [
                    'class' => 'form-control border border-gray-300 text-gray-900 rounded hover:shadow focus:outline-none focus:bg-gray-100 focus:bg-opacity-50 focus:border-gray-400 py-2 px-4',
                    'placeholder' => 'Title'
                ],
                'empty_data' => '',
                'required' => true
            ])
            ->add('description', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control border border-gray-300 text-gray-900 rounded hover:shadow focus:outline-none focus:bg-gray-100 focus:bg-opacity-50 focus:border-gray-400 py-2 px-4',
                    'placeholder' => 'Description',
                    'rows' => 5
                ],
                'empty_data' => '',
                'required' => true
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
                'attr' => [
                    'class' => 'form-control border border-gray-300 text-gray-900 rounded hover:shadow focus:outline-none focus:bg-gray-100 focus:bg-opacity-50 focus:border-gray-400 py-2 px-4',
                    'placeholder' => 'Description'
                ],
                'empty_data' => '',
                'required' => true
            ])
            ->add('mediaVideos', CollectionType::class, [
                'constraints' => new \Symfony\Component\Validator\Constraints\Valid(),
                'entry_type' => MediaVideoFormType::class,
                'label' => false,
                'required' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false
            ])
            ->add('mediaPictures', CollectionType::class, [
                'entry_type' => MediaPictureFormType::class,
                'label' => false,
                'required' => false,
                'mapped' => true,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Trick::class
        ]);
    }
}
