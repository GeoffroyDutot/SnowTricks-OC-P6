<?php


namespace App\Form;


use App\Entity\MediaPicture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MediaPictureFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', FileType::class, [
                'label' => 'Picture',
                'mapped' => false,
                'attr' => [
                    'class' => 'form-control border border-gray-300 text-gray-900 rounded hover:shadow focus:outline-none focus:bg-gray-100 focus:bg-opacity-50 focus:border-gray-400 py-2 px-4',
                    'placeholder' => 'snowtrick.png'
                ],
                'multiple' => false,
                'row_attr' => ['class' => 'flex flex-col py-5 px-8'],
                'empty_data' => '',
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MediaPicture::class
        ]);
    }
}
