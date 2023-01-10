<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FirstController extends AbstractController
{
    #[Route('/first', name: 'FirstController')]
    public function index(): Response
    {
        return $this->render('first/index.html.twig', [
           'controller_name' => 'FirstController',
           'firstname' => 'Xavier',
           'lastname' => 'DUPONT',
        ]);
    }

    #[Route('/sayhello', name: 'sayhello')]
    public function sayHello(): Response
    {
        if(rand(0,10) % 2){
            //return $this->redirectToRoute('FirstController');
            return $this->forward('App\Controller\FirstController::index');
        }
        return $this->render('first/hello.html.twig', [
           'controller_name' => 'SayHello',
           'firstname' => 'Robert',
           'lastname' => 'DURANT',
        ]);


    }
}

