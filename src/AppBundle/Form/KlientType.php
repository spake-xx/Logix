<?php

// src/AppBundle/Form/KlientType.php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class KlientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imie', TextType::class)
            ->add('nazwisko', TextType::class)
            ->add('adres', TextType::class)
            ->add('miasto', TextType::class)
            ->add('telefon', TextType::class)
            ->add('Zapisz', SubmitType::class)
        ;
    }
}