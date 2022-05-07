<?php

namespace App\Controller;

use Faker\Provider\sr_RS\Person;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonController extends AbstractController
{
    private $manager ;
    private $repository ;

//public function __construct(private ManagerRegistry $doctrine)
//{
//
//    $this->manager=$this->$doctrine->getManager() ;
//    $this->repository=$this->$doctrine->getRepository(Person::class);
//
//}


    #[Route('/person', name: 'app_person')]
    public function index(): Response
    {
        $persons =$this->repository->findAll() ;
        return $this->render('person/index.html.twig', [
            'persons' =>$persons,
        ]);
    }
}
