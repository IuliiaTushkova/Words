<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\AccountCreationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function accountCreation(Request $request, EntityManagerInterface $entityManager)
    {
        $user = new User();
        $user->setRoles(["ROLE_USER"]);
        $accountCreationForm = $this->createForm(AccountCreationType::class);
        $accountCreationForm->handleRequest($request);
        if($accountCreationForm->isSubmitted() && $accountCreationForm->isValid())
        {
            $entityManager->persist($user);
            $entityManager->flush();
            $this->addFlash('success', 'Ton compte est bien créé!');

            return $this->redirectToRoute('account_created');

        }


        return $this->render('account_creation/accountCreation.html.twig', [
            'accountCreationForm' => $accountCreationForm->createView(),
        ]);
    }

    /*
     * submit a new user
     * redirect to the user page connected
     */

    /**
     * @Route("/account", name="account_created")
     */
    public function submitAccount(User $currentUser)
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
