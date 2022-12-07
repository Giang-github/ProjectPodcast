<?php

namespace App\Form;

use App\Entity\Post;
use App\Entity\User;
use App\Entity\Course;
use App\Entity\Category;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;


class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add(
                'image', FileType::class,
                [
                    'mapped' => false,
                    'required' => false,
                    'constraints' => [
                        new File([
                            'maxSize' => '5024k',
                            'mimeTypes' => [
                                'image/bmp',
                                'image/png',
                                'image/jpeg',
                                'image/x-png',
                                'image/gif',
                            ],
                            'mimeTypesMessage' => 'Please upload a valid Picture document',
                        ])
                    ]

                ]
            )
            // ->add('content')
            // ->add('category')
            // ->add('course')
            // ->add('creator')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}