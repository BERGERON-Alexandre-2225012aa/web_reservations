<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $reservation_id;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'reservation')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private User $user;

    #[ORM\ManyToOne(targetEntity: Resource::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private Resource $resource;

    #[ORM\Column(type: 'date')]
    private \DateTimeInterface $date;

    #[ORM\Column(type: 'time')]
    private \DateTimeInterface $heure;

    #[ORM\Column(type: 'integer')]
    private int $nombrePersonnes;

    // Getters and Setters
}
