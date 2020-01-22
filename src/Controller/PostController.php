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
        //dump($post); die;
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
    public function addIlosc(Post $post){


    }
    /*
    /**
     * @Route("/order", name="order")
     * @ParamConverter("player", options={"mapping": {"player_name" : "name"}})
     * @ParamConverter("gather", options={"mapping": {"gather_id"   : "id"}})
     * @return Response
     */
    
    /*
    public function order(Post $html){
        
      //  $order= new Request(
      //      $_GET,
      //  )
      $post_data = array();

      // a new dom object
      $dom = new DomDocument; 
  
      //load the html into the object
      $dom->loadHTML($html); 
      //discard white space
      $dom->preserveWhiteSpace = false; 
  
      //all input tags as a list
      $input_tags = $dom->getElementsByTagName('input'); 
  
      //get all rows from the table
      for ($i = 0; $i < $input_tags->length; $i++) 
      {
          if( is_object($input_tags->item($i)) )
          {
              $name = $value = '';
              $name_o = $input_tags->item($i)->attributes->getNamedItem('name');
              if(is_object($name_o))
              {
                  $name = $name_o->value;
  
                  $value_o = $input_tags->item($i)->attributes->getNamedItem('value');
                  if(is_object($value_o))
                  {
                      $value = $input_tags->item($i)->attributes->getNamedItem('value')->value;
                  }
  
                  $post_data[$name] = $value;
              }
          }
      }
      var_dump($post_data);
      return $post_data;  
       return $this->render('post/order.html.twig');
    
  }
*/
    
}
