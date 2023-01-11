<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/sayhello/{name}/{firstname}', name: 'say.hello')]
    public function sayHello(Request $request, $name, $firstname): Response
    {
       // dd($request);
        return $this->render('first/hello.html.twig', [ 
            'name' => $name,
            'firstname' => $firstname,
        ]);


    }
}

