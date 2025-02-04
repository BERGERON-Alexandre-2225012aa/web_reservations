<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user/new', name: 'user_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Créer une nouvelle instance de l'entité User
        $user = new User();

        // Créer le formulaire basé sur UserType
        $form = $this->createForm(UserType::class, $user);

        // Gérer la soumission du formulaire
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Persister les données dans la base de données
            $entityManager->persist($user);
            $entityManager->flush();

            // Ajouter un message flash pour indiquer le succès
            $this->addFlash('success', 'User ajouté avec succès !');

            // Rediriger vers une autre page
            return $this->redirectToRoute('home');
        }

        // Rendre la vue avec le formulaire
        return $this->render('user/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
