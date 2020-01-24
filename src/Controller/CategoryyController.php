<?php

namespace App\Controller;
use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use App\Entity\Comments;
use App\Form\CommentsType;
use App\Repository\CommentsRepository;
use App\Entity\Categoryy;
use App\Form\CategoryyType;
use App\Repository\CategoryyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;


//private $user_id;
/**
 * @Route("/categoryy")
 */
class CategoryyController extends AbstractController
{
    /**
     * @Route("/", name="categoryy_index", methods={"GET"})
     */
    public function index(CategoryyRepository $categoryyRepository): Response
    {   dump($categoryyRepository); 
        return $this->render('categoryy/index.html.twig', [
            'categoryy' => $categoryyRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="categoryy_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $categoryy = new Categoryy();
        $form = $this->createForm(CategoryyType::class, $categoryy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            
            $file=$request->files->get('categoryy')['attachment'];
            //dump($file);
            if($file){
                $filename= md5(uniqid()).'.'. $file->guessClientExtension();
                $file->move(
                    //TODO: get target directory, 
                    $this->getParameter('uploads_dir'),
                    $filename
                );
                $categoryy->setImage($filename);
            }
            $file=$request->files->get('categoryy')['baner'];
            //dump($file);
            if($file){
                $filename= md5(uniqid()).'.'. $file->guessClientExtension();
                $file->move(
                    //TODO: get target directory, 
                    $this->getParameter('uploads_dir'),
                    $filename
                );
                $categoryy->setBaner($filename);
            }
            $entityManager->persist($categoryy);
            $entityManager->flush();
            return $this->redirectToRoute('main');
        }

        return $this->render('categoryy/new.html.twig', [
            'categoryy' => $categoryy,
            'form' => $form->createView(),
        ]);
    }
    //https://symfony.com/doc/current/security.html
    /**
     * @Route("/{id}", name="categoryy_show", methods={"GET", "POST"})
     */
    public function show(Categoryy $categoryy, Request $request, Security $security ): Response
    {   $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
            //$user=1;
        $user = $this->getUser()->getId();
        //dump($user); die;
        //$user -> getID();
        
        $comments = new Comments();
        $form = $this->createForm(
            CommentsType::class, $comments,[
         //   'user_id' =>$user,
        ]
    );
       // $form->handleRequest($request);
        if ($request->isMethod('POST')) {
          //  $form->get('user')->submit('categoryy_id');
          //  $form->submit(array_merge(['categoryy_id'=>$user], $request->request->all() ), false);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comments);
            $entityManager->flush();


            }
        }

        return $this->render('categoryy/show.html.twig', [
            'categoryy' => $categoryy,
            'form'=> $form->createView()
        ]);
        
    }

    /**
     * @Route("/{id}/edit", name="categoryy_edit", methods={"GET","POST"})
     */
    protected function edit(Request $request, Categoryy $categoryy): Response
    {
        $form = $this->createForm(CategoryyType::class, $categoryy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('main');
        }

        return $this->render('categoryy/edit.html.twig', [
            'categoryy' => $categoryy,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="categoryy_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Categoryy $categoryy): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categoryy->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($categoryy);
            $entityManager->flush();
        }
        /*
        $em= $this->getDoctrine()->getManager();
        $em->remove($post);
        $em->flush();
        $this->addFlash('success', 'Post was removed');
        return $this->redirect($this->generateUrl('post.index')); */
        return $this->redirectToRoute('main');
    }
    public function privatePage( Security $security ) : Response
    {
   // $user_id = $security->getUser()->getId();
    // ... do whatever you want with $user
    //return $user_id;
    }

    
    
}
