<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Resource;
use App\Entity\Reservation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Créer et persister des utilisateurs
        $user1 = new User();
        $user1->setNom('Dupont')
            ->setPrenom('Jean')
            ->setEmail('jean.dupont@example.com')
            ->setTelephone('1234567890');
        $manager->persist($user1);

        $user2 = new User();
        $user2->setNom('Martin')
            ->setPrenom('Paul')
            ->setEmail('paul.martin@example.com')
            ->setTelephone('0987654321');
        $manager->persist($user2);

        // Créer et persister des ressources
        $resource1 = new Resource();
        $resource1->setType('table')
            ->setDescription('Table 1');
        $manager->persist($resource1);

        $resource2 = new Resource();
        $resource2->setType('table')
            ->setDescription('Table 2');
        $manager->persist($resource2);

        // Créer et persister des réservations
        $reservation = new Reservation();
        $reservation->setUser($user1)
            ->setResource($resource1)
            ->setDate(new \DateTime('2025-02-10'))
            ->setHeure(new \DateTime('12:00'))
            ->setNombrePersonnes(4);
        $manager->persist($reservation);

        // Sauvegarder dans la base de données
        $manager->flush();
    }
}
