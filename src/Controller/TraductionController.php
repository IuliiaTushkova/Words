<?php

namespace App\Controller;

use App\Entity\Traduction;
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

class TraductionController extends AbstractController
{
    /*
     * add a word
     */
    /**
     * @Route("/add/word", name="add_word")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, TraductionRepository $repository)
    {
        $traduction = new Traduction();
        $traductionForm = $this->createForm(TraductionType::class, $traduction);
        $traductionForm->handleRequest($request);

        if($traductionForm->isSubmitted() && $traductionForm->isValid())
        {
            $traduction->setUser($this->getUser());




        }
        return $this->render('words/addWords.html.twig',
            [
                'traductionForm' => $traductionForm->createView(),
                'view' => 'addWord'
            ]);
    }
}
