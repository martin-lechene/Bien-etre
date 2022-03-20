<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Sliders;
use App\Entity\Categorys;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(EntityManagerInterface $entitymanager, AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('home');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        $repository = $entitymanager->getRepository(User::class);
        $user = $repository->findLatest();
        $repository = $entitymanager->getRepository(Categorys::class);
        $categorys = $repository->findLatest();
        $repository = $entitymanager->getRepository(Sliders::class);
        $sliders = $repository->findLatest();
        return $this->render('security/login.html.twig',
         ['last_username' => $lastUsername, "user" => $user, 'error' => $error, "categorys" => $categorys, "sliders" => $sliders]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
