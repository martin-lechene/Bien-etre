<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Images;
use App\Entity\Sliders;
use App\Entity\Services;
use App\Form\SearchType;
use App\Entity\Categorys;
use App\Entity\Prestataires;
use Doctrine\ORM\EntityRepository;
use App\Entity\CategorieDeServices;
use App\Entity\Prestataire;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\PrestatairesRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     * @param Request $request
     * 
     */
    public function index(Request $request, PrestatairesRepository $repo, EntityManagerInterface $entitymanager): Response
    {
       
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

        $query = $request->request->get('form','query');

        if($query) {
            // $prestataires = $repo->findByQuery($query['name'], $query['nameCity'], $query['numPostal'], $query['categoryService']);
            if(!empty($query['name'])) {
                $prestataires = $repo->findPrestatairesByName($query['name']);
            }
            if(!empty($query['numPostal'])) {
                $prestataires = $repo->findPrestatairesByPostal($query['numPostal']);
            }
                if(!empty($query['nameCity'])) {
                $prestataires = $repo->findPrestatairesByCity($query['nameCity']);    
            }
            if(!empty($query['categoryService'])) {
                $prestataires = $repo->findPrestatairesByCategory($query['categoryService']);
            }
            
        }
        return $this->render('search/index.html.twig', [
            "categorys" => $categorys,
            "sliders" => $sliders,
            "services" => $services,
            "prestataires" => $prestataires,
            "user" => $user,
        ]);
    }

    /**
     * @Route("/search", name="search_result")
     * 
     */
    public function search(EntityManagerInterface $entitymanager, Request $request): Response
    {
        $prestatairesSearchForm = $this->createFormBuilder(SearchType::class);

       

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
     


        return $this->render('search/search.html.twig', 
        [
            "categorys" => $categorys,
            "sliders" => $sliders,
            "services" => $services,
            "prestataires" => $prestataires,
            "user" => $user,
            "search_form" => $prestatairesSearchForm->getForm()->createView(),
        ]);
    }

    public function searchBar2()
    {
        $form = $this->createFormBuilder()
            ->setAction($this->generateUrl('handleSearch'))
            ->add(
                'name', TextType::class, [
                'label' => 'Nom du prestataire',
                'label_attr' => ['class' => 'text-info mt-3'],
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Choisissez un prestataire',
                ],
            ])
            ->add('nameCity', TextType::class, [
                'label' => 'Ville',
                'label_attr' => ['class' => 'text-info mt-3'],
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Choisissez une ville',
                ],
            ])
            ->add('numPostal', TextType::class, [
                'label' => "Code postal",
                'label_attr' => ['class' => 'text-info mt-3'],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Entrez un code postal'
                ],
                'required' => false,
                ])
            ->add('categoryService', TextType::class, [
                // 'class' => Prestataires::class,
                'label' => "Catégorie",
                'label_attr' => ['class' => 'text-info mt-3'],
                // 'choice_label' => 'categoryService',
                // 'query_builder' => function (EntityRepository $er) {
                    // return $er->createQueryBuilder('u')
                        // ->orderBy('u.categoryService', 'ASC')->groupBy('u.categoryService');
                // },
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Choisissez une catégorie'
                ],
                'required' => false,
                ])
            ->add('recherche', SubmitType::class, [
                
                'attr' => [
                    'class' => 'btn btn-info mt-3'
                ]
            ])
            ->getForm();
        return $this->render('search/searchBar.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/handleSearch", name="handleSearch")
     * @param Request $request
     */
    public function handleSearch(Request $request, PrestatairesRepository $repo, EntityManagerInterface $entitymanager)
    {
       
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

        $query = $request->request->get('form','query');

        if($query) {
            // $prestataires = $repo->findByQuery($query['name'], $query['nameCity'], $query['numPostal'], $query['categoryService']);
            if(!empty($query['name'])) {
                $prestataires = $repo->findPrestatairesByName($query['name']);
            }
            if(!empty($query['numPostal'])) {
                $prestataires = $repo->findPrestatairesByPostal($query['numPostal']);
            }
                if(!empty($query['nameCity'])) {
                $prestataires = $repo->findPrestatairesByCity($query['nameCity']);    
            }
            if(!empty($query['categoryService'])) {
                $prestataires = $repo->findPrestatairesByCategory($query['categoryService']);
            }
            
        }
        return $this->render('search/index.html.twig', [
            "categorys" => $categorys,
            "sliders" => $sliders,
            "services" => $services,
            "prestataires" => $prestataires,
            "user" => $user,
        ]);
    }

    public function searchBar(EntityManagerInterface $entitymanager): Response
    {
      

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
                'required' => false,
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
                'required' => false,
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
                'required' => false,
                "label" => "Ville",
                'label_attr' => [
                    'class' => 'text-white'
                ],
                'attr'=> [
                    'class' => 'form-control',
                    'placeholder' => 'Ex : Paris'
                ]
            ])

            ->add('rechercher', SubmitType::class, [
                'attr'=> [
                    'class' => 'btn btn-info mt-3 '
                ]
            ])
            ->getForm();

        return $this->render('search/searchBar.html.twig', [
            "categorys" => $categorys,
            "sliders" => $sliders,
            "services" => $services,
            "prestataires" => $prestataires,
            "user" => $user,
            'form' => $form->createView()
        ]);
    }
}
