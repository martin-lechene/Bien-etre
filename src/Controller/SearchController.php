<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

use App\Entity\CategorieDeServices;
use App\Entity\Categorys;
use App\Entity\Sliders;
use App\Entity\Prestataires;
use App\Entity\Services;
use App\Entity\User;
use App\Entity\Images;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
    public function index(EntityManagerInterface $entitymanager): Response
    {
        $repository = $entitymanager->getRepository(CategorieDeServices::class);
        $categories = $repository->findAll();
        $enAvant = $repository->findBy(
            array('enAvant' => '1')
        );

        $repository = $entitymanager->getRepository(Prestataires::class);
        $prestataires = $repository->findLatest();

        $repository = $entitymanager->getRepository(Services::class);
        $services = $repository->findLatest();

        $repository = $entitymanager->getRepository(User::class);
        $user = $repository->findOneBy(
            array('id' => '1')
        );

        $repository = $entitymanager->getRepository(Sliders::class);
        $sliders = $repository->findBy(
            array('id' => '1')
        );

        $repository = $entitymanager->getRepository(Categorys::class);
        $categorys = $repository->findLatest();
     
        return $this->render('search/index.html.twig', [
            "categorys" => $categorys,
            "sliders" => $sliders,
            "services" => $services,
            "prestataires" => $prestataires,
            "user" => $user,
            "categorieEnAvant" => $enAvant,
            //'q' => '$q', 
        ]);
    }

    public function searchBar(EntityManagerInterface $entitymanager): Response
    {
        $repository = $entitymanager->getRepository(CategorieDeServices::class);
        $categories = $repository->findAll();
        $enAvant = $repository->findBy(
            array('enAvant' => '1')
        );

        $repository = $entitymanager->getRepository(Prestataires::class);
        $prestataires = $repository->findLatest();

        $repository = $entitymanager->getRepository(Services::class);
        $services = $repository->findLatest();

        $repository = $entitymanager->getRepository(User::class);
        $user = $repository->findOneBy(
            array('id' => '1')
        );

        $repository = $entitymanager->getRepository(Sliders::class);
        $sliders = $repository->findBy(
            array('id' => '1')
        );

        $repository = $entitymanager->getRepository(Categorys::class);
        $categorys = $repository->findLatest();

        $form = $this->createFormBuilder(null)
            ->setAction($this->generateUrl('search'))
            ->add('name', TextType::class, [
                'label' => "Nom d'un prestataire",
                'label_attr' => [
                    'class' => 'text-white'
                ],
                'attr' => [
                    'placeholder' => 'Ex : Koif koif',
                    'class' => 'form-control tinymce'
                ],
            ])
            ->add('num_postal', NumberType::class, [
                "label" => "Code postal",
                'label_attr' => [
                    'class' => 'text-white'
                ],
                'attr'=> [
                    'class' => 'form-control',
                    'placeholder' => 'Ex : 75000'
                ]
            ])
            ->add('name_city', TextType::class, [
                "label" => "Ville",
                'label_attr' => [
                    'class' => 'text-white'
                ],
                'attr'=> [
                    'class' => 'form-control',
                    'placeholder' => 'Ex : Paris'
                ]
            ])

            ->add('recherche', SubmitType::class, [
                'attr'=> [
                    'class' => 'btn btn-success mt-3 '
                ]
            ])
            ->getForm();

        return $this->render('search/searchBar.html.twig', [
            "categorys" => $categorys,
            "sliders" => $sliders,
            "services" => $services,
            "prestataires" => $prestataires,
            "user" => $user,
            "categorieEnAvant" => $enAvant,
            'form' => $form->createView()
        ]);
    }
}
