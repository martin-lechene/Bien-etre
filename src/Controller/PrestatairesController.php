<?php

namespace App\Controller;

use App\Entity\CategorieDeServices;
use App\Entity\Prestataires;
use App\Entity\Categorys;
use App\Entity\User;
use App\Entity\Sliders;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PrestatairesController extends AbstractController
{
    /**
     * @Route("/prestataires", name="prestataires_index")
     */
    public function index(EntityManagerInterface $entitymanager, Request $request): Response
    {
        $repository = $entitymanager->getRepository(CategorieDeServices::class);
        $categories = $repository->findAll();
        $enAvant = $repository->findBy(
            array('enAvant' => '1')
        );
        $repository = $entitymanager->getRepository(Prestataires::class);
        $prestataires = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Categorys::class);
        $categorys = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Sliders::class);
        $sliders = $repository->findLatest();

        $repository = $entitymanager->getRepository(User::class);
        $user = $repository->findLatest();
        
        return $this->render('prestataires/index.html.twig', [
            "categorys" => $categorys,
            "prestataires" => $prestataires,
            "sliders" => $sliders,
            "user" => $user,
        ]);
    }
    /**
     * @Route("/prestataires/{id}", name="prestataires_show")
     */
    public function show(Prestataires $prestataire, EntityManagerInterface $entitymanager): Response
    {
        $repository = $entitymanager->getRepository(Categorys::class);
        $categorys = $repository->findLatest();

        $repository = $entitymanager->getRepository(Prestataires::class);
        $prestataires = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Sliders::class);
        $sliders = $repository->findLatest();

        $repository = $entitymanager->getRepository(User::class);
        $user = $repository->findLatest();

        return $this->render('prestataires/show.html.twig', [
            "prestataire" => $prestataire,
            "prestataires" => $prestataires,
            "categorys" => $categorys,
            "sliders" => $sliders,
            "user" => $user,
        ]);
    }
    /**
     * @Route("/prestataires/{id}/edit", name="prestataires_edit",  methods={"GET"})
     */
    public function edit(Prestataires $prestataire, EntityManagerInterface $entitymanager): Response
    {
        $repository = $entitymanager->getRepository(Categorys::class);
        $categorys = $repository->findLatest();

        $repository = $entitymanager->getRepository(Prestataires::class);
        $prestataires = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Sliders::class);
        $sliders = $repository->findLatest();

        $repository = $entitymanager->getRepository(User::class);
        $user = $repository->findLatest();
        
        return $this->render('prestataires/edit.html.twig', [
            "prestataire" => $prestataire,
            "prestataires" => $prestataires,
            "categorys" => $categorys,
            "sliders" => $sliders,
            "user" => $user,
        ]);
    }
    /**
     * @Route("/prestataires/{id}/delete", name="prestataires_delete",  methods={"GET"})
     */
    public function delete(Prestataires $prestataire, EntityManagerInterface $entitymanager): Response
    {
        $repository = $entitymanager->getRepository(Categorys::class);
        $categorys = $repository->findLatest();

        $repository = $entitymanager->getRepository(Prestataires::class);
        $prestataires = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Sliders::class);
        $sliders = $repository->findLatest();
        $repository = $entitymanager->getRepository(User::class);
        $user = $repository->findLatest();
        return $this->render('prestataires/show.html.twig', [
            "prestataire" => $prestataire,
            "prestataires" => $prestataires,
            "categorys" => $categorys,
            "sliders" => $sliders,
            "user" => $user,
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
            ->setAction($this->generateUrl('prestataires.handleSearch'))
            ->add('Rechercher', TextType::class, [
                'attr'=> [
                    'class' => 'form-control text-info'
                ]
            ])
            ->add('recherche', SubmitType::class, [
                'attr'=> [
                    'class' => 'btn btn-success'
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

    // /**
    // * @Route('/handleSeach' name='handleSearch', methods={"POST"})
    // * @param Request $request
    // */

    // public function handleSearch(Request $request)
    // {
         
    // }
}
