<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class RegistrationController extends AbstractController{
    /**
     * @Route("/register", name="register", methods={"GET", "POST"})
     */


    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, UserRepository $userRepository)
    {
        //https://symfony.com/doc/current/reference/forms/types/repeated.html
           // $users=$userRepository->findAll(['username']);
            //$query ="SELECT username FROM users WHERE username = ?";
            
           
            $form= $this->createFormBuilder()
                ->add('username')
                ->add('password', RepeatedType::class, [
                    'type'=> PasswordType::class,
                    'required' => true,
                    'first_options'  => ['label' => 'Password'],
                    'second_options' => ['label' => 'Confirm Password']
                ])
                ->add('Register', SubmitType::class,[
                    'attr'=>[
                        'class'=> 'btn btn-success float-right'
                    ]
                ])
                ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
        $data=$form->getData();
       // dump($data); die;
        $name=$data['username'];
        $pass=$data['password'];
        $user = $userRepository->findOneByUsername($name);
        $x=strlen($pass);
        if(!$user==null){
            $this->addFlash(
                'notice',
                'User already exists!');
                return $this->render('registration/index.html.twig', [
                    'form'=>$form->createView()
                    ]);
        }
        if($x<4){
            $this->addFlash(
                'notice',
                'Hasło za słabe!');
                return $this->render('registration/index.html.twig', [
                    'form'=>$form->createView()
                    ]);

        }
        if($form->isSubmitted() && $form->isValid() && $user==null){
            
            
            $data=$form->getData();
        
            $name=$data['username'];
            $user = $userRepository->findOneByUsername($name);
           // dump($user); die;
          //  if($user==null);
           // dump($x); die;
           // if($x>=1 ){
          //      return $this->render('registration/index.html.twig', [
          //          'form'=>$form->createView()
          //      ]); }
            $user=new User();
            $user->setUsername($data['username']);
            $user->setPassword(
                $passwordEncoder->encodePassword($user,$data['password'])
            );
           // dump($user);
            $em= $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
              return $this->redirect($this->generateUrl('app_login'));
        }

    } 
    
        return $this->render('registration/index.html.twig', [
            'form'=>$form->createView()
           // 'controller_name' => 'RegistrationController',
        ]);
    }
}
