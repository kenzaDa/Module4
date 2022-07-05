<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Validator\Constraints\LessThan;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\Length;
class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom',textType::class,['required' => true])
            ->add('Prenom',textType::class,['required' => true])
            ->add('Age',NumberType::class, [
                'constraints'=> [new LessThan([
                    'value' => 100]),
                    new GreaterThan([
                        'value' => 1
                    ])
                    ]
            ])
            ->add('Adresse',textareaType::class,['required' => true , 'constraints' => new Length([
                'max' => 255
            ])
        ])
            ->add('Code_Postal',NumberType::class, [
                'required' => true,
                'constraints' => [new LessThan([
                    'value' => 100000,
                    'message' => 'Le code postal doit être une valeur de 5 chiffres'
                ]),
                new GreaterThan([
                    'value' => 9999,
                    'message' => 'Le code postal doit être une valeur de 5 chiffres'
                ])]
            ])
            ->add('Ville',ChoiceType::class, [
                'choices' => [
                    'Nabeul' => 1,
                    'Tunis' => 2,
                    'Sfax' => 3,
                    'Sousse' => 4, 
                    'Bizerte' => 5, 
                    'Siliana' => 6, 
                    'Tozeur' => 7,
                ],'required' => true],)
                ->add('Permis',  ChoiceType::class, [
                    'choices' => [
                        'AM' => 'AM',
                        'A1'=> 'A1',
                        'A2'=> 'A2' ,
                        'A'=> 'A',
                        'B1'=> 'B1',
                        'B' => 'B' 
                    ]  , 'expanded' => true,
                    'multiple' => false,'required' => false])
            ->add('envoyer', SubmitType::class)
          ;
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
