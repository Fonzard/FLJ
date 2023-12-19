<?php

namespace App\Controller\Admin;
use App\Entity\Project;
use App\Entity\User;
use App\Entity\Contact;
use App\Entity\Homepage;
use App\Entity\Formation;
use App\Entity\Presentation;
use App\Entity\OwnerPresentation;
use App\Entity\CustomMadeFormation;
use App\Entity\PartnershipFormation;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use App\Controller\Admin\Homepage\HomepageCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(HomepageCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('FLJ');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::subMenu('Homepage', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Gérer la page d\'accueil', 'fas fa-eye', Homepage::class)->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud('Gérer son introduction', 'fas fa-eye', OwnerPresentation::class)->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud('Gérer les formations partenaires', 'fas fa-eye', PartnershipFormation::class)->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud('Gérer les formations sur mesure', 'fas fa-eye', CustomMadeFormation::class)->setAction(Crud::PAGE_INDEX),

        ]);
        yield MenuItem::subMenu('Présentation', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Gérer le texte de présentation', 'fas fa-eye', Presentation::class)->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud('Gérer les projets', 'fas fa-eye', Project::class)->setAction(Crud::PAGE_INDEX),
        ]);
        yield MenuItem::linkToCrud('Contact', 'fas fa-message', Contact::class);
        yield MenuItem::linkToCrud('User', 'fas fa-user', User::class);
    }
}
