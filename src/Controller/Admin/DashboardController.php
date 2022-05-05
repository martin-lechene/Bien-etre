<?php

namespace App\Controller\Admin;
use App\Entity\BlogPost;
use App\Entity\Categories;
use App\Entity\Category;
use App\Entity\Comment;
use App\Entity\User;
use App\Entity\Prestataires;
use App\Entity\Sliders;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // you can also render some template to display a proper Dashboard
        // (tip: it's easier if your template extends from )
        return $this->render('admin/board.html.twig');
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            // the name visible to end users
            ->setTitle('Bien être')
            // you can include HTML contents too (e.g. to link to an image)
            ->setTitle('<a class="text-info text-center p-1 mb-5" href="admin"><img src="/img/logo.png"> Bien-être</a>')
            // the path defined in this method is passed to the Twig asset() function
            ->setFaviconPath('favicon.ico')
            // the domain used by default is 'messages'
            ->setTranslationDomain('en')
            // there's no need to define the "text direction" explicitly because
            // its default value is inferred dynamically from the user locale
            ->setTextDirection('ltr')
            // set this option if you prefer the page content to span the entire
            // browser width, instead of the default design which sets a max width
            ->renderContentMaximized()
            // set this option if you prefer the sidebar (which contains the main menu)
            // to be displayed as a narrow column instead of the default expanded design
            //->renderSidebarMinimized()
            // by default, all backend URLs include a signature hash. If a user changes any
            // query parameter (to "hack" the backend) the signature won't match and EasyAdmin
            // triggers an error. If this causes any issue in your backend, call this method
            // to disable this feature and remove all URL signature checks
            ->disableUrlSignatures()
            // by default, all backend URLs are generated as absolute URLs. If you
            // need to generate relative URLs instead, call this method
            ->generateRelativeUrls()
        ;
    }
   
    public function configureMenuItems(): iterable
    {   
         return [
            MenuItem::section('<p class="text-info">Listes de toutes les pages</p>'),
            MenuItem::linkToUrl('Homepage', 'fa fa-home', '../'),
            MenuItem::linkToUrl('About', 'fa fa-info','/about'),
            MenuItem::linkToUrl('Contact', 'fa fa-envelope', '/contact'),
            
            MenuItem::section('<p class="text-info">Catégories de services</p>'),
            MenuItem::linkToUrl('Listes services', 'fa fa-list', '/service'),
            MenuItem::linkToUrl('Ajouter un service', 'fa fa-plus', '/service/add'),
            
            MenuItem::section('<p class="text-info">Prestataires</p>'),
            MenuItem::linkToUrl('Listes des prestataires', 'fa fa-list', '/'),
            MenuItem::linkToUrl('Ajouter un prestataires', 'fa fa-plus', '/add'), 
            MenuItem::linkToUrl('Panel de gestion', 'fa fa-cogs', '/gestion'),

            MenuItem::section('<p class="text-info">Utilisateurs</p>'),
            MenuItem::linkToUrl('Listes des utilisateurs', 'fa fa-list', '/'),
            MenuItem::linkToUrl('Ajouter un utilisateur', 'fa fa-plus', '/add'),
                
            MenuItem::section('<p class="text-info">Mise en avant</p>'),
            MenuItem::linkToUrl('Modifier le(s) slider(s) en avant', 'fa fa-info', '/'),
            MenuItem::linkToUrl('Modifier le(s) prestataire(s) en avant', 'fa fa-user', '/'),
            MenuItem::linkToUrl('Modifier le(s) catégories de services mis en avant', 'fa fa-user-alt', '/'),
            
        ];
    }
}
