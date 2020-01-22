<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Post;
use Doctrine\ORM\Mapping\MappedSuperclass;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

//bin/console doctrine:schema:update --dump-sql
//bin/console doctrine:schema:update --force
//https://www.youtube.com/watch?v=l5QLodEL1jo&list=PLqhuffi3fiMONS5B7zzD2nqGxf_TmpQB1
//https://www.youtube.com/watch?v=MRfsHix1eRA
class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
