<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;    // based functional of symfony
use Symfony\Component\HttpFoundation\Request;                        // receipt all parameters in url
use Symfony\Component\HttpFoundation\Response;                       // send data
use Symfony\Component\Routing\Annotation\Route;                      // root



class HomeController extends AbstractController
{

    #[Route('/')]
    public function homepage(): Response
    {
        return $this->render('home/home.html.twig', [
            'text' => "est l’étang où chaque canard peut déployer ses ailes et faire entendre sa voix! Alors, rejoignez le bavardage et laissez les conversations couler comme de l’eau sur le dos d’un canard!",
            'create' => "Créer un compte",
            'login' => "Se connecter",
        ]);

    }


}