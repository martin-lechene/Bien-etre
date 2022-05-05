<?php

namespace App\Form;

use App\Faker\PrestatairesProvider;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('categorys', ChoiceType::class, [
                'choices' => [
                    array_combine(PrestatairesProvider::CATEGORYS, PrestatairesProvider::CATEGORYS)
                ]
            ])
            // Add name_city
            ->add('name_city', TextType::class, [
                'label' => 'Ville',
                'required' => false,
            ])
            // add num_postal
            ->add('num_postal', TextType::class, [
                'label' => 'Code postal',
                'required' => false,
            ])
            ->add('recherche', SubmitType::class, [
                'label' => 'Rechercher',    
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ]);

    }    
}