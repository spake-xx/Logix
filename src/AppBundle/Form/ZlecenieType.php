<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ZlecenieType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('nazwa', TextType::class)
            ->add('opis', TextType::class)
            ->add('status', ChoiceType::class, array(
                'choices'=>array(
                    'GOTOWE'=>'GOTOWE',
                    'W REALIZACJI'=>'W REALIZACJI'
                )
            ))
            ->add('klient', 'entity', array(
                'class' => 'AppBundle:Klient',
            ))
            ->add('programista', 'entity', array(
                'class' => 'AppBundle:Programista',
            ))
            ->add('technologia', 'entity', array(
                'class' => 'AppBundle:Technologia',
            ))
            ->add('Zapisz', SubmitType::class);
    }
}