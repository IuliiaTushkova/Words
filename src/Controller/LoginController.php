<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /*
     * go to the landing page
     */

    /**
     * @Route("/", name="login_LP")
     */
    public function login()
    {
        return $this->render('login_LP/landingPage.html.twig',[
            'view'=>'viewLP'
        ]);
    }

    /*
     * go to the page "Découvrir le projet"
     * */
    /**
     * @Route("/about", name="descover_project")
     */
    public function about(){

        return $this->render('login_LP/decouvrirLeProjet.html.twig',
        [
            'view' => 'aboutVieuw'
        ]);
    }


}
