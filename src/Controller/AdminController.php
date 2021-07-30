<?php

namespace App\Controller;

use App\Entity\TypeDemande;
use App\Form\CategorieType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends AbstractController
{
    #[Route('/admin', name:'admin_home')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }


    #[Route('/type/ajout', name:'type_ajout')]
    public function ajoutType(Request $request)
    {
        $categorietype = new CategorieType();

        $form = $this->createForm(TypeDemande::class, $categorietype);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
           $em = $this->getDoctrine()->getManager();
           $em->persist($categorietype);
           $em->flush();

           return $this->redirectToRoute('admin_home');
        }
        return $this->render('admin/categories/ajout.html.twig', [
            'form' => $form->createView()
        ]);
    }
}