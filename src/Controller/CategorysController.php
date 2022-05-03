<?php

namespace App\Controller;

use App\Entity\Categorys;
use App\Entity\Sliders;
use App\Entity\Prestataires;
use App\Entity\Services;
use App\Entity\Images;
use App\Entity\User;
use App\Form\CategorysType;
use App\Repository\CategorysRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorysController extends AbstractController
{
    /**
     * @Route("/categorys", name="categorys_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entitymanager, Request $request): Response
    {
        $repository = $entitymanager->getRepository(Prestataires::class);
        $prestataires = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Categorys::class);
        $categorys = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Sliders::class);
        $sliders = $repository->findLatest();

        $repository = $entitymanager->getRepository(Services::class);
        $services = $repository->findLatest();

        $repository = $entitymanager->getRepository(User::class);
        $user = $repository->findLatest();
        
        return $this->render('categorys/index.html.twig', [
            "categorys" => $categorys,
            "prestataires" => $prestataires,
            "sliders" => $sliders,
            "user" => $user,
            "services" => $services,
        ]);
    }

    /**
     * @Route("/categorys/new", name="categorys_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entitymanager): Response
    {
        $repository = $entitymanager->getRepository(Prestataires::class);
        $prestataires = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Categorys::class);
        $categorys = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Sliders::class);
        $sliders = $repository->findLatest();

        $repository = $entitymanager->getRepository(Services::class);
        $services = $repository->findLatest();

        $category = new Categorys();
        $form = $this->createForm(CategorysType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entitymanager->persist($category);
            $entitymanager->flush();

            return $this->redirectToRoute('categorys_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('categorys/new.html.twig', [
            'category' => $category,
            "categorys" => $categorys,
            "prestataires" => $prestataires,
            "sliders" => $sliders,
            "services" => $services,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/categorys/{id}", name="categorys_show", methods={"GET", "POST"})
     */
    public function show(Categorys $category, EntityManagerInterface $entitymanager): Response
    {
        $repository = $entitymanager->getRepository(Prestataires::class);
        $prestataires = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Categorys::class);
        $categorys = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Sliders::class);
        $sliders = $repository->findLatest();

        $repository = $entitymanager->getRepository(Services::class);
        $services = $repository->findLatest();


        return $this->render('categorys/show.html.twig', [
            'category' => $category,
            "categorys" => $categorys,
            "prestataires" => $prestataires,
            "sliders" => $sliders,
            "services" => $services,
        ]);
    }
     /**
     * @Route("/categorys/{id}/show", name="categorys_show2", methods={"GET", "POST"})
     */
    public function show2(Categorys $category, EntityManagerInterface $entitymanager): Response
    {
        $repository = $entitymanager->getRepository(Prestataires::class);
        $prestataires = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Categorys::class);
        $categorys = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Sliders::class);
        $sliders = $repository->findLatest();

        $repository = $entitymanager->getRepository(Services::class);
        $services = $repository->findLatest();


        return $this->render('categorys/show.html.twig', [
            'category' => $category,
            "categorys" => $categorys,
            "prestataires" => $prestataires,
            "sliders" => $sliders,
            "services" => $services,
        ]);
    }

    /**
     * @Route("/categorys/{id}/edit", name="categorys_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Categorys $category, EntityManagerInterface $entitymanager): Response
    {
        $repository = $entitymanager->getRepository(Prestataires::class);
        $prestataires = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Categorys::class);
        $categorys = $repository->findLatest();
        
        $repository = $entitymanager->getRepository(Sliders::class);
        $sliders = $repository->findLatest();

        $repository = $entitymanager->getRepository(Services::class);
        $services = $repository->findLatest();

        $form = $this->createForm(CategorysType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entitymanager->flush();

            return $this->redirectToRoute('categorys_index', [], Response::HTTP_SEE_OTHER);
        }


        return $this->renderForm('categorys/edit.html.twig', [
            'category' => $category,
            "categorys" => $categorys,
            "prestataires" => $prestataires,
            "sliders" => $sliders,
            "services" => $services,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/categorys/{id}/delete", name="categorys_delete", methods={"POST"})
     */
    public function delete(Request $request, Categorys $category, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$category->getId(), $request->request->get('_token'))) {
            $entityManager->remove($category);
            $entityManager->flush();
        }

        return $this->redirectToRoute('categorys_index', [], Response::HTTP_SEE_OTHER);
    }
}
