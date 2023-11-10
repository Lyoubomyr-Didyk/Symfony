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
            'text' => "is the web pond where every duck can spread their wings and let their voices be heard! So, join the chatter and let the conversations flow like water off a duck's back!"
        ]);

    }


}