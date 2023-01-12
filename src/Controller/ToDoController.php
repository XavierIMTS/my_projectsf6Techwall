<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ToDoController extends AbstractController
{
   

    public string $achat;
    public string $cours;
    public string $correction;
    public array $toDoList;
    
       
    #[Route('/todo', name: 'index')]
    public function index(Request $request): Response
    {
        $session = $request->getSession();
        // Afficher notre tableau de todo
        // sinon je l'initialise puis l'affiche
        if(!$session->has('todos')) {
            $todos = array(
                "achat" => 'acheter une clef usb' ,  
                "cours" => 'finaliser mon cours' ,  
                "correction" => 'corriger les exercices'
            );

            $session->set('todos', $todos);

        }
        // Si j'ai mon tableau de toto dans ma session je ne fait que l'afficher
 

        return $this->render('to_do/index2.html.twig', [
           
        ]);
    }

    #[Route('/todo/{name}/{content}', name: 'todo.add')]
public function addTodo(Request $request, $name, $content) 
{
    // Vérifier si j'ai mon tableau de todo dans la session
        // Si oui


        // Si non
            // afficher une erreur et on va rediriger ver le controleur index

}




// version avec passage de valeur par l'url
// ex: http://localhost:8000/todo/indexAction/acheter une clef usb/finaliser mon cours/corriger les exercices

    #[Route('/todo/indexAction/{achat}/{cours}/{correction}', name: 'indexAction')]
    public function indexAction(Request $request, $achat, $cours, $correction): Response
    {
        $this->achat = $achat;
        $this->cours = $cours;
        $this->correction = $correction;

        $session = $request->getSession();
        $this->addElement($session);

        $this->toDoList = $session->get('toDoList');

       
        //dd($this->toDoList);
        return $this->render('to_do/index.html.twig', [
            'toDoList' => $this->toDoList
        ]);
       
    }

    private function addElement($session):void
    {
        if($session->has('toDoList')){

            $this->toDoList = $session->get('toDoList') ;

            array_push($this->toDoList,
             ["achat" => $this->achat ,  
             "cours" => $this->cours ,  
             "correction" => $this->correction ]);
           
        } else {
            $this->toDoList = array();
            array_push($this->toDoList,
            ["achat" => $this->achat ,  
            "cours" => $this->cours ,  
            "correction" => $this->correction ]);
        }

        $session->set('toDoList', $this->toDoList );

    }
}
