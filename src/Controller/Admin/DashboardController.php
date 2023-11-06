<?php

namespace App\Controller\Admin;
use App\Entity\User;
use App\Entity\Contact;
use App\Entity\Formation;
use App\Entity\Homepage;
use App\Entity\Presentation;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
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
        yield MenuItem::linkToCrud('Formation', 'fas fa-school', Formation::class);
        yield MenuItem::linkToCrud('Contact', 'fas fa-message', Contact::class);
        yield MenuItem::linkToCrud('Homepage', 'fas fa-house', Homepage::class);
        yield MenuItem::linkToCrud('Presentation', 'fas fa-circle-info', Presentation::class);
        yield MenuItem::linkToCrud('User', 'fas fa-user', User::class);
    }
}
