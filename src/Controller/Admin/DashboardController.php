<?php

namespace App\Controller\Admin;

use App\Entity\Competence;
use App\Entity\Employee;
use App\Entity\EmployeePosition;
use App\Entity\ExpectationLevel;
use App\Entity\GroupCompetence;
use App\Entity\Grade;
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
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(GroupCompetenceCrudController::class)->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Competence panel');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoRoute('Table of competence', 'fa-solid fa-table', 'tableCompetence');
        yield MenuItem::subMenu('Data management', 'fas fa-user')->setSubItems([
            MenuItem::linkToCrud('Grade', 'fas fa-file-text', Grade::class),
            MenuItem::linkToCrud('Group Competence', 'fas fa-user', GroupCompetence::class),
            MenuItem::linkToCrud('Competence', 'fas fa-file-text', Competence::class),
            MenuItem::linkToCrud('Expectation Level', 'fas fa-clipboard-check', ExpectationLevel::class),
            MenuItem::linkToCrud('Employees', 'fas fa-user', Employee::class),
            MenuItem::linkToCrud('Employee Position', 'fa-solid fa-chart-gantt', EmployeePosition::class),
        ]);
    }
}