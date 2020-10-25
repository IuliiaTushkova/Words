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
     * @Route("/", name="login")
     */
    public function login()
    {
        return $this->render('login/login.html.twig');
    }

    /*
     * go to the connexion page
     * sign in or login in
     */
    /**
     * @Route("/connection", name="connection")
     */
    public function connection(){

        return $this->render('registration/register.html.twig');
    }

    /*
     * go to the page "About us"
     * */
    /**
     * @Route("/about", name="aboutUs")
     */
    public function about(){

        return $this->render('login/aboutUs.html.twig');
    }

}
