<?php

namespace App\Form;

use App\Entity\Camping;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CampingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Namecamp')
            ->add('Descamp')
            ->add('Placecamp')
            ->add('Datecamp')
            ->add('Ndaycamp')
            ->add('Idgroupe')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Camping::class,
        ]);
    }
}
