<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Entity\Prestataires;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(EntityManagerInterface $entitymanager): Response
    {
        $repository = $entitymanager->getRepository(Categories::class);
        $categories = $repository->findAll();

        $repository = $entitymanager->getRepository(Prestataires::class);
        $prestataires = $repository->findAll();

        return $this->render('home/index.html.twig', [
            "prestataires" => $prestataires,
            "categories" => $categories,
        ]);
    }
}
