<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Resource;
use App\Entity\Reservation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordEncoder;

    // Injection du service UserPasswordHasherInterface
    public function __construct(UserPasswordHasherInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager): void
    {
        // Créer et persister des utilisateurs avec des mots de passe encodés
        $user1 = new User();
        $user1->setNom('Dupont')
            ->setPrenom('Jean')
            ->setEmail('jean.dupont@example.com')
            ->setTelephone('1234567890');

        // Utiliser la méthode hashPassword avec l'objet User
        $encodedPassword1 = $this->passwordEncoder->hashPassword($user1, 'password123');
        $user1->setPassword($encodedPassword1); // Affecter le mot de passe encodé
        $manager->persist($user1);

        $user2 = new User();
        $user2->setNom('Martin')
            ->setPrenom('Paul')
            ->setEmail('paul.martin@example.com')
            ->setTelephone('0987654321');

        // Utiliser la méthode hashPassword avec l'objet User
        $encodedPassword2 = $this->passwordEncoder->hashPassword($user2, 'password456');
        $user2->setPassword($encodedPassword2); // Affecter le mot de passe encodé
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
