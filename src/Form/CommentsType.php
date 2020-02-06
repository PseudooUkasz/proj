<?php

namespace App\Form;
use App\Entity\Categoryy;
use App\Entity\User;
use App\Entity\Comments;
//use Symfony\Bridge\Doctrine\Form\Type\CommentsType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DataType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Doctrine\ORM\Mapping\MappedSuperclass;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
//https://stackoverflow.com/questions/38048806/one-to-many-to-one-with-attributes-form-with-symfony-3-doctrine
class CommentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text', null, array('label'=> 'Dodaj nowy Komentarz')
             /*['query_builder'=>function(Categoryy $id){
              return $id->createQuerryBuilder('categoryy_id')
                
            }] */) /*
            ->add('categoryy', EntityType::class,[
              'class'=> Categoryy::class
          ])
          ->add('user_id', EntityType::class,[
            'class'=> User::class
        ]) */

           // -add()
           // ->add('categoryy_id',//'null',[
             //   'user_id'==$options['user_id']
           // ]
          //  )
          ->add('save', SubmitType::class,[
            'attr'=>[
                'class'=> 'btn btn-primary float-right'
            ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
          'data_class' => Comments::class,
           //'user_id' => true,
            // Configure your form options here
            //
       ]
      );
      //  $resolver->setAllowedTypes(/*'user_id', 'integer'*/);
    }
}
