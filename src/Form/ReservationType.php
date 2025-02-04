<?php

namespace App\Form;

use App\Entity\Reservation;
use App\Entity\Resource;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class, [
                'widget' => 'single_text', // Permet d'utiliser un input type="date" en HTML5
                'html5' => true, // Active l'affichage natif HTML5
                'attr' => ['class' => 'form-control'], // Ajoute une classe pour le CSS
            ])
            ->add('heure', TimeType::class, [
                'widget' => 'single_text', // Input type="time" en HTML5
                'html5' => true,
                'attr' => ['class' => 'form-control'],
            ])
            ->add('nombrePersonnes', IntegerType::class, [
                'attr' => ['class' => 'form-control'],
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('resource', EntityType::class, [
                'class' => Resource::class,
                'choice_label' => 'id',
                'attr' => ['class' => 'form-control'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}

