<?php

namespace App\Form;

use App\Entity\Categoryy;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\ORM\Mapping\MappedSuperclass;
use Symfony\Component\Validator\Constraints\File;

class CategoryyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array('label'=> 'Tytuł artykułu:'))
            ->add('slug' ,null, array('label'=> 'Krótki opis:'))
            ->add('text' , null, array('label'=> 'Treść artykułu:'))
            ->add('attachment',  FileType::class, ['mapped'=>false, 'label'=> 'Obraz główny:',
            'constraints' => [
                new File([
                    'maxSize' => '5024k',
                    'mimeTypes' => [
                        'image/*',

                    ],
                    'mimeTypesMessage' => 'tylko obrazy ',
                ])
            ],
            
            
            
            ] )
            ->add('baner',  FileType::class,['mapped'=>false, 'label'=> 'Banner artykułu:',
            'constraints' => [
                new File([
                    'maxSize' => '5024k',
                    'mimeTypes' => [
                        'image/*',

                    ],
                    'mimeTypesMessage' => 'tylko obrazy ',
                ])
            ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Categoryy::class,
        ]);
    }
}
/*
->add('titile')
            ->add('attachment', FileType::class,[
                'mapped' =>false
            ])
            ->add('category', EntityType::class,[
                'class'=> Category::class
            ])
            ->add('ilosc')
            ->add('cena')
            ->add('opis')
            ->add('save', SubmitType::class,[
                'attr'=>[
                    'class'=> 'btn btn-primary float-right'
                ]
            ])
        ; */