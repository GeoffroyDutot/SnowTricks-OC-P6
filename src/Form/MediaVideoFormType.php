<?php

namespace App\Form;

use App\Entity\MediaVideo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MediaVideoFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('link', UrlType::class, [
                'label' => 'Url',
                'attr' => [
                    'class' => 'form-control border border-gray-300 text-gray-900 rounded hover:shadow focus:outline-none focus:bg-gray-100 focus:bg-opacity-50 focus:border-gray-400 py-2 px-4',
                    'placeholder' => 'https://www.youtube.com/embed/SQyTWk7OxSI'
                ],
                'row_attr' => ['class' => 'flex flex-col py-5 px-8'],
                'empty_data' => '',
                'required' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MediaVideo::class,
        ]);
    }
}
