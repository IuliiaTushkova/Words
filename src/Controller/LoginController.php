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
     * connection with account
     * submit connection form
     * get requet with user data to check
     * send user id into session
     */
    /**
     * @Route("/connection", name="connection")
     */
    public function connection(){

        return $this->render('userPageConnected.html.twig');
    }
}
