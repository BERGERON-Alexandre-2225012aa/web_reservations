<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    #[Route('/reservation/new', name: 'reservation_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Créer une nouvelle instance de l'entité Reservation
        $reservation = new Reservation();

        // Créer le formulaire basé sur ReservationType
        $form = $this->createForm(ReservationType::class, $reservation);

        // Gérer la soumission du formulaire
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Persister les données dans la base de données
            $entityManager->persist($reservation);
            $entityManager->flush();

            // Ajouter un message flash pour indiquer le succès
            $this->addFlash('success', 'Réservation ajoutée avec succès !');

            // Rediriger vers une autre page (par exemple la liste des réservations)
            return $this->redirectToRoute('reservation_list');
        }

        // Rendre la vue avec le formulaire
        return $this->render('reservation/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
