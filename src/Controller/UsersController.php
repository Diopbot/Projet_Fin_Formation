<?php

namespace App\Controller;

use App\Entity\Demande;
use App\Form\DemandeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsersController extends AbstractController
{
    #[Route('/users', name:'users')]

    public function index(): Response
    {
        return $this->render('users/index.html.twig',[
            'controller_name' => 'UsersController',
        ]);
    }
    #[Route('/users/demande/new', name:'users_demande_new')]
    public function newDemande(Request $request)
    {
        $demande = new Demande();

        $form = $this->createForm(DemandeType::class, $demande);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $demande->setUsers($this->getUser());
            $demande->setActive(false);

            $em = $this->getDoctrine()->getManager();
            $em->persist($demande);
            $em->flush();

            return $this->redirectToRoute('users');
        }

        return $this->render('users/demande/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
