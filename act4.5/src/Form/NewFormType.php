<?php

namespace App\Form;

use App\Entity\NewForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Validator\Constraints\LessThan;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;


class NewFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('montant',moneyType::class,['required' => true,  'data' => 375, 'currency'=> 'USD' ])
           
            ->add('confirmationemail',RepeatedType::class,['type'=>EmailType ::class,'first_options'  => ['label' => 'Email'],
            'second_options' => ['label' => 'Repeat Email'],'required' => true,'attr' => [
                'placeholder' => 'example@site.com'
            ],
       ])
       ->add('numero', TelType::class, [
        'required' => true,
        'constraints' => [new Length([
            'min'=> 10,
            'max'=> 10,
            'exactMessage' => 'Votre numero doit faire 10 chiffres de long'
        ]),
        new Regex([
            'pattern' => '/^0[67]/',
            'message' => 'Le numero doit commencer par 06 ou 07'
        ])]
    ])
            ->add('envoyer', SubmitType::class)
          ;
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => NewForm::class,
        ]);
    }
}
