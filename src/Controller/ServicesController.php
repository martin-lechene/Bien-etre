<?php

namespace App\Controller;

use App\Entity\Categorys;
use App\Entity\Prestataires;
use App\Entity\Images;
use App\Entity\Services;
use App\Entity\User;
use App\Entity\Sliders;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ServicesController extends AbstractController
{
    
    /**
     * @Route("/services", name="services_index")
     */
    public function index(Request $request, EntityManagerInterface $entitymanager): Response
    {
        
    
        $repository = $entitymanager->getRepository(Categorys::class);
        $categorys = $repository->findLatest();

        $repository = $entitymanager->getRepository(Prestataires::class);
        $prestataires = $repository->findLatest();

        $repository = $entitymanager->getRepository(Services::class);
        $services = $repository->findLatest();

        $repository = $entitymanager->getRepository(Sliders::class);
        $sliders = $repository->findLatest();


        return $this->render('services/index.html.twig', [
            "categorys" => $categorys,
            "sliders" => $sliders,
            "prestataires" => $prestataires,
            "services" => $services,
        ]);
    }


    /**
     * @Route("/services/{id}/show", name="services_show")
     */
    public function show(Services $service, EntityManagerInterface $entitymanager): Response
    {
        $repository = $entitymanager->getRepository(Prestataires::class);
        $prestataires = $repository->findLatest();

        $repository = $entitymanager->getRepository(Categorys::class);
        $categorys = $repository->findLatest();
     
        $repository = $entitymanager->getRepository(Sliders::class);
        $sliders = $repository->findLatest();

        $repository = $entitymanager->getRepository(Services::class);
        $services = $repository->findLatest();

        return $this->render('services/show.html.twig', [
            "categorys" => $categorys,
            "prestataires" => $prestataires,
            "sliders" => $sliders,
            "service" => $service,
            "services" => $service
        ]);
    }
     /**
     * @Route("/services/{id}/edit", name="services_edit",  methods={"GET"})
     */
    public function edit(Services $service, EntityManagerInterface $entitymanager): Response
    {
        $repository = $entitymanager->getRepository(Categorys::class);
        $categorys = $repository->findLatest();

        $repository = $entitymanager->getRepository(Prestataires::class);
        $prestataires = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Sliders::class);
        $sliders = $repository->findLatest();

        $repository = $entitymanager->getRepository(Services::class);
        $services = $repository->findLatest();

        
        return $this->render('services/edit.html.twig', [
            "prestataires" => $prestataires,
            "categorys" => $categorys,
            "sliders" => $sliders,
            "services" => $services,
            "service" => $service,
            
        ]);
    }
     /**
     * @Route("/services/{id}/delete", name="services_delete",  methods={"GET"})
     */
    public function delete(Services $service, EntityManagerInterface $entitymanager): Response
    {
        $repository = $entitymanager->getRepository(Categorys::class);
        $categorys = $repository->findLatest();

        $repository = $entitymanager->getRepository(Prestataires::class);
        $prestataires = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Sliders::class);
        $sliders = $repository->findLatest();

        $repository = $entitymanager->getRepository(Services::class);
        $services = $repository->findLatest();
        

        return $this->render('prestataires/show.html.twig', [    
            "prestataires" => $prestataires,
            "categorys" => $categorys,
            "sliders" => $sliders,
            "services" => $services,
            "service" => $service,
        ]);
    }
}
