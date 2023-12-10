<?php

namespace App\Controller\Admin;

use App\Entity\Advertisement;
use App\Entity\Brand;
use App\Entity\CategoryMoto;
use App\Entity\ImagesAdvert;
use App\Entity\ModelMoto;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        //$adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        //return $this->redirect($adminUrlGenerator->setController(AdvertisementCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
         return $this->render('admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Projet Symfony');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Utilisateurs');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-list', User::class);
    
        yield MenuItem::section('Annonces');
        yield MenuItem::linkToCrud('Annonces', 'fas fa-list', Advertisement::class);
        yield MenuItem::linkToCrud('Images', 'fas fa-list', ImagesAdvert::class);

        yield MenuItem::section('Motos');
        yield MenuItem::linkToCrud('Marques', 'fas fa-list', Brand::class);
        yield MenuItem::linkToCrud('Categories', 'fas fa-list', CategoryMoto::class);
        yield MenuItem::linkToCrud('Modeles', 'fas fa-list', ModelMoto::class);

    }
}
