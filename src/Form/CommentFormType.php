<?php

namespace App\Form;

use App\Entity\Comment;
use App\Entity\Trick;
use Egulias\EmailValidator\Warning\Warning;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('message', TextareaType::class, [
                'attr' => [
                    'class' => 'resize bg-gray-100 border border-gray-400 rounded w-3/5 focus:outline-none focus:bg-white placeholder-gray-700',
                    'placeholder' => 'Type your comment...'
                ],
                'label' => 'Message',
                'required' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comment::class
        ]);
    }
}
