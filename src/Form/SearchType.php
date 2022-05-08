<?php

namespace App\Form;

use App\Entity\Categorys;
use App\Entity\Prestataires;


use Doctrine\ORM\EntityRepository;
use App\Faker\PrestatairesProvider;
use Symfony\Bridge\Doctrine\Form\Type\EntityType as EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder;

    }    
}