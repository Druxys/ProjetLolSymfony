<?php

namespace App\Form;

use App\Entity\Tournament;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UpdateTournamentFormType extends AbstractType {


public function buildForm(FormBuilderInterface $builder, array $options)
{
    $builder->add('name', TextType::class)
        ->add('start_tournament', DateType::class)
        ->add('end_tournament', DateType::class)
        ->add('numbers_participants', NumberType::class)
        ->add('type_tournament', TextType::class)
        ->add('group_stage', CheckboxType::class);
}


public function configureOptions(OptionsResolver $resolver)
{
    $resolver->setDefaults([
        'data_class' => Tournament::class
    ]);
}

}