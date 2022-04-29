<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Votre e-mail',
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'autocomplete' => 'new-email',
                ],

            ])
            ->add('roles', ChoiceType::class, [
                'required' => true,
                'multiple' => false,
                'label' => 'Quels types d\'utilisateur souhaitez-vous êtes ?',
                'expanded' => false,
                'attr' => [
                    'class' => 'form-control',
                ],
                'choices'  => [
                  'Un visiteur' => 'ROLE_INTERNAUTE',
                  'Un prestataire' => 'ROLE_PRESTATAIRE',
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'label' => 'J\'accepte les conditions d\uttilisation.',
                'attr' => [
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password', 'class' => 'form-control'],
                'label' => 'Votre mot de passe',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrer un mot de passe !',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit contenir minimum  {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                        'maxMessage' => 'Votre mot de passe doit contenir maximun {{ limit }} characters',
                    ]),
                ],
            ])
        ;

         // Data transformer
         $builder->get('roles')
         ->addModelTransformer(new CallbackTransformer(
             function ($rolesArray) {
                  // transform the array to a string
                  return count($rolesArray)? $rolesArray[0]: null;
             },
             function ($rolesString) {
                  // transform the string back to an array
                  return [$rolesString];
             }
        ));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
