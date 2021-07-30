<?php

namespace App\Form;

use App\Entity\Demande;
use App\Entity\TypeDemande;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DemandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numeroRegistre')
            ->add('dateDemande', DateType::class)
            ->add('etat')
            ->add('nombreCopies')
            ->add('users', EntityType::class, [
                'class' => Users::class
        ])
            ->add('typeDemande', EntityType::class, [
                'class' => TypeDemande::class
            ])
            ->add('Valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Demande::class,
        ]);
    }
}
