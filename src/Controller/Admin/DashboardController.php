<?php

namespace App\Controller\Admin;

use App\Entity\BlogPost;
use App\Entity\Peinture;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(BlogPostCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('AntoineBernabeu');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Actualités', 'fas fa-newspaper', BlogPost::class);
        yield MenuItem::linkToCrud('Peintures', 'fas fa-palette', Peinture::class);
    }
}
