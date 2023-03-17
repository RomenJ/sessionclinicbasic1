<?php

namespace App\Form;

use App\Entity\Sessionvaloracion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SessionvaloracionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        
            ->add('fecha')
            ->add('medico')
            ->add('paciente')
            ->add('patologia1')
            ->add('patologia2')
            ->add('patologia3')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sessionvaloracion::class,
        ]);
    }
}
