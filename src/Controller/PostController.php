<?php
namespace App\Controller;
use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/post",name="post.")
 */
class PostController extends AbstractController{
    /**
     * @Route("/", name="index")
     */
    public function index(PostRepository $postRepository) {
        $posts=$postRepository->findAll();
        //dump($posts);
        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
            'posts'=>$posts,
        ]);
    }
    /**
     * @Route("/create", name="create")
     */
    public function create(Request $request) {
        //create new post
        $post = new Post();
        //statyczne dodanie postu
        //$post->setTitile('to bedzie tytuł');
        $form=$this->createForm(PostType::class, $post);
        $form->handleRequest($request);
        //$form->getErrors(); && $form->isValid()
        if($form->isSubmitted() ){
            $em= $this->getDoctrine()->getManager();
            /**@var UploadedFile $file */
            $file=$request->files->get('post')['attachment'];
            dump($file);
            if($file){
                $filename= md5(uniqid()).'.'. $file->guessClientExtension();
                $file->move(
                    //TODO: get target directory, 
                    $this->getParameter('uploads_dir'),
                    $filename
                );
                $post->setImage($filename);
            }
            $em->persist($post);
            $em->flush();
            //dump($post);
            return $this->redirect($this->generateUrl('post.index'));
        }

   
       return $this->render('post/create.html.twig',[
           'form'=> $form->createView()
       ]);
        // return $this->redirect($this->generateUrl('post.index'));
       // return new Response('post was created');
    }
    /**
     * @Route("/show/{id}", name="show")
     * @return Response
     */
    public function show(Post $post /*$id, PostRepository $postRepository*/)  {
       // $post=$postRepository->findPostWithCategory($id);
        //dump($post);
        //$post=$postRepository->find($id);
       // dump($post); die;
        return $this->render('post/show.html.twig',[
          'post'=> $post
        ]);
    }
    /**
     * @Route("/delete{id}", name="delete")
     * @return Response
     */
    public function remove(Post $post) {
        $em= $this->getDoctrine()->getManager();
        $em->remove($post);
        $em->flush();
        $this->addFlash('success', 'Post was removed');
        return $this->redirect($this->generateUrl('post.index'));
    }
}
