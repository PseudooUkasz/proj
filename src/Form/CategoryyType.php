<?php

namespace App\Form;

use App\Entity\Categoryy;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\ORM\Mapping\MappedSuperclass;

class CategoryyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('slug')
            ->add('text')
            ->add('attachment', FileType::class,['mapped'=>false])
            ->add('baner', FileType::class,['mapped'=>false])
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