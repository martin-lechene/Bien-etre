<?php

namespace App\Controller;

use App\Entity\CategorieDeServices;
use App\Entity\Categorys;
use App\Entity\Sliders;
use App\Entity\Prestataires;
use App\Entity\Services;
use App\Entity\User;
use App\Entity\Images;
use knp\Component\Pager\PaginatorInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(EntityManagerInterface $entitymanager): Response
    {
        
        $repository = $entitymanager->getRepository(Prestataires::class);
        $prestataires = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Categorys::class);
        $categorys = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Sliders::class);
        $sliders = $repository->findLatest();

        $repository = $entitymanager->getRepository(User::class);
        $user = $repository->findLatest();

        return $this->render('home/index.html.twig', [
            "categorys" => $categorys,
            "sliders" => $sliders,
            "prestataires" => $prestataires,
            "user" => $user,
        ]);
    }

    /**
     * @Route("/about", name="about")
     */
    public function about(EntityManagerInterface $entitymanager): Response
    {
        
        $repository = $entitymanager->getRepository(Prestataires::class);
        $prestataires = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Categorys::class);
        $categorys = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Sliders::class);
        $sliders = $repository->findLatest();

        $repository = $entitymanager->getRepository(User::class);
        $user = $repository->findLatest();

        return $this->render('home/about.html.twig', [
            "prestataires" => $prestataires,
            "sliders" => $sliders,
            "categorys" => $categorys,
            "user" => $user,
        ]);
    }
    
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(EntityManagerInterface $entitymanager): Response
    {
      
        $repository = $entitymanager->getRepository(Prestataires::class);
        $prestataires = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Categorys::class);
        $categorys = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Sliders::class);
        $sliders = $repository->findLatest();

        $repository = $entitymanager->getRepository(User::class);
        $user = $repository->findLatest();

        return $this->render('home/contact.html.twig', [
            "categorys" => $categorys,
            "user" => $user,
            "sliders" => $sliders,
            "prestataires" => $prestataires,
        ]);
    }

    /**
     * @Route("/recents", name="recents")
     */
    public function recents(EntityManagerInterface $entitymanager): Response
    {
     
        $repository = $entitymanager->getRepository(Prestataires::class);
        $prestataires = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Categorys::class);
        $categorys = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Sliders::class);
        $sliders = $repository->findLatest();

        $repository = $entitymanager->getRepository(User::class);
        $user = $repository->findLatest();

        return $this->render('home/recents.html.twig', [
            "categorys" => $categorys,
            "prestataires" => $prestataires,
            "sliders" => $sliders,
        ]);
    }

    /**
     * @Route("/profil", name="profil_index")
     */
    public function index(EntityManagerInterface $entitymanager, Request $request): Response
    {
        
        $repository = $entitymanager->getRepository(Prestataires::class);
        $prestataires = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Categorys::class);
        $categorys = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Sliders::class);
        $sliders = $repository->findLatest();

        $repository = $entitymanager->getRepository(User::class);
        $user = $repository->findLatest();

        return $this->render('profil/index.html.twig', [
            "categorys" => $categorys,
            "prestataires" => $prestataires,
            "sliders" => $sliders,
            "user" => $user,
        ]);
    }
    /**
     * @Route("/profil/{id}", name="profil_show")
     */
    public function show(User $user, EntityManagerInterface $entitymanager): Response
    {
       
        $repository = $entitymanager->getRepository(Prestataires::class);
        $prestataires = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Categorys::class);
        $categorys = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Sliders::class);
        $sliders = $repository->findLatest();

        $repository = $entitymanager->getRepository(User::class);
        $user = $repository->findLatest();


        return $this->render('profil/show.html.twig', [
            "prestataires" => $prestataires,
            "categorys" => $categorys,
            "sliders" => $sliders,
            "user" => $user,
        ]);
    }
    /**
     * @Route("/profil/{id}/edit", name="profil_edit",  methods={"GET"})
     */
    public function edit(User $user, EntityManagerInterface $entitymanager): Response
    {
      
        $repository = $entitymanager->getRepository(Prestataires::class);
        $prestataires = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Categorys::class);
        $categorys = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Sliders::class);
        $sliders = $repository->findLatest();

        $repository = $entitymanager->getRepository(User::class);
        $user = $repository->findLatest();
        
        return $this->render('profil/edit.html.twig', [
            "prestataires" => $prestataires,
            "categorys" => $categorys,
            "sliders" => $sliders,
            "user" => $user,
        ]);
    }
    /**
     * @Route("/profil/{id}/delete", name="profil_delete",  methods={"GET"})
     */
    public function delete(User $user, EntityManagerInterface $entitymanager): Response
    {
      
        $repository = $entitymanager->getRepository(Prestataires::class);
        $prestataires = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Categorys::class);
        $categorys = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Sliders::class);
        $sliders = $repository->findLatest();

        $repository = $entitymanager->getRepository(User::class);
        $user = $repository->findLatest();
          
        return $this->render('profil/show.html.twig', [
            "prestataires" => $prestataires,
            "categorys" => $categorys,
            "sliders" => $sliders,
            "user" => $user,
        ]);
    }
}