<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NotatkaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('notatka')
            ->add('programista', 'entity', array(
                'class' => 'AppBundle:Programista',
            ))
            ->add('zlecenie', 'entity', array(
                'class' => 'AppBundle:Zlecenie',
            ))
            ->add('Zapisz', SubmitType::class)
        ;
    }
}