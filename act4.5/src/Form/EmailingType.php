<?php

namespace App\Form;

use App\Entity\Emailing;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Email;

use App\Validator\Leboncoin;

class EmailingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Firstname',textType::class,['required' => true])
            ->add('Lastname',textType::class,['required' => true])
            ->add('email',textType::class,['required' => true, 'constraints' => [new Email ([
              
                'message' => 'Entrer une adresse mail valide'
            ]),
           ]])
            ->add('numero',telType::class )
            ->add('leboncoin',textType::class,['required' => true,'constraints' => [new Leboncoin 
           ]])

            ->add('enregistrer', SubmitType::class)
            ;
          
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Emailing::class,
        ]);
    }
}
