<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

//https://getbootstrap.com/docs/4.3/components/navbar/
//https://www.youtube.com/watch?v=Bo0guUbL5uo
//1:50  2:40:09
//https://www.baszczewski.pl/2013/10/twig-dobry-system-szablonow/
//https://www.tutorialspoint.com/symfony/symfony_routing.htm
//https://flex.symfony.com/
//https://symfony.com/doc/current/index.html
//https://www.youtube.com/watch?v=t5ZedKnWX9E

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */

    public function index()
    {
       

        // the template path is the relative file path from `templates/`
        return $this->render('index.html.twig');
    }
    /**
     * @Route("/custom/{name?}", name="custom")
     * @param Request $request
     * @return Response
     */

    public function custom(Request $request){
        //dump($request->get('name'));
        $name = $request->get('name');
        return $this->render('custom.html.twig',[
            'name' => $name
        ]);
    }


}