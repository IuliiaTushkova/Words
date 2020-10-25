<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AccountCreationController extends AbstractController
{
    /*
     * pressing btn 'creer un compte'
     * redirect to the account creation view
     */

    /**
     * @Route("/account/creation", name="account_creation")
     */
    public function accountCreation()
    {
        //@todo create a form
        return $this->render('account_creation/accountCreation.html.twig');
    }

    /*
     * submit a new user
     * redirect to the user page connected
     */

    /**
     * @Route("/loged/{id}", requirements={"id"="\d+"}, name="account_created")
     */
    public function submitAccount($id)
    {

        // @todo create userPageConnected.html.twig
        return $this->render('account_creation/accountCreation.html.twig');
    }

    /*
     * go back to the landing page non connected
     * pressing "revenir" or "se deconnecter"
     */

    /**
     * @Route("/back", name="disconnect_back")
     */
    public function disconnect()
    {
        return $this->render('login/login.html.twig');
    }

}
