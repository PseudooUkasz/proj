<?php

namespace App\Controller;
use App\Entity\Comments;
use App\Form\CommentsType;
use App\Repository\CommentsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class CommentsController extends AbstractController
{
    /**
     * @Route("/comments", name="comments")
     */
    public function index()
    {
        return $this->render('comments/index.html.twig', [
            'controller_name' => 'CommentsController',
        ]);
    }
    /*
    public function remove(Comments $comments) {
        $em= $this->getDoctrine()->getManager();
        $em->remove($comments);
        $em->flush();
        $this->addFlash('success', 'Post was removed');
        return $this->redirect($this->generateUrl('post.index'));
    } */
} 
