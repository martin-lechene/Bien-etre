<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrestatairesController extends AbstractDashboardController
{
    /**
     * @Route("/gestion", name="gestion")
     */
    public function index(): Response
    {
        return $this->render('admin/gestion.html.twig');
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Bien Etre');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::section('<p class="text-info">Listes de toutes les pages</p>'),
            MenuItem::linkToUrl('Homepage', 'fa fa-home', '../'),
            MenuItem::linkToUrl('About', 'fa fa-info','/about'),
            MenuItem::linkToUrl('Contact', 'fa fa-envelope', '/contact'),
            MenuItem::linkToUrl('Gestion', 'fa fa-cogs', '/gestion'),

            MenuItem::section('<p class="text-info">Catégories de services</p>'),
            MenuItem::linkToUrl('Listes services', 'fa fa-list', '/categorys'),
            MenuItem::linkToUrl('Ajouter un service', 'fa fa-plus', '/categorys/add'),
            
            MenuItem::section('<p class="text-info">Prestation</p>'),
            MenuItem::linkToUrl('Ajouter une prestation', 'fa fa-plus', '/add'), 

            MenuItem::linkToUrl('Listes des utilisateurs', 'fa fa-list', '/'),  
        ];
    }
}
