<?php

namespace App\Controller;

use App\Entity\CategorieDeServices;
use App\Entity\Prestataires;
use App\Entity\Categorys;
use App\Entity\Sliders;
use App\Entity\Services;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils,EntityManagerInterface $entityManager): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }
        
        $repository = $entityManager->getRepository(CategorieDeServices::class);
        $categories = $repository->findAll();
        $enAvant = $repository->findBy(
            array('enAvant' => '1')
        );

        $repository = $entityManager->getRepository(Prestataires::class);
        $prestataires = $repository->findLatest();

        $repository = $entityManager->getRepository(Services::class);
        
        $repository = $entityManager->getRepository(Sliders::class);
        $sliders = $repository->findBy(
            array('id' => '1')
        );

        $repository = $entityManager->getRepository(Categorys::class);
        $categorys = $repository->findLatest();
        $services = $repository->findLatest();

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            "categorys" => $categorys,
            "sliders" => $sliders,
            "services" => $services,
            "prestataires" => $prestataires,
            "user" => $lastUsername,
            'last_username' => $lastUsername,
            "error" => $error
        ]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
