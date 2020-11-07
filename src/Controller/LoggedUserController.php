<?php

namespace App\Controller;

use App\Entity\Traduction;
use App\Entity\Word;
use App\Form\TraductionType;
use App\Repository\TraductionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/home")
 *
 */
class LoggedUserController extends AbstractController
{
    /*
    * go to the connected landing page
    * */
    /**
     * @Route("/", name="connected_landing")
     */
    public function connected()
    {

        return $this->render('logged_user/connectedLanding.html.twig',
            [
                'view' => 'connectedLanding'
            ]);
    }

}
