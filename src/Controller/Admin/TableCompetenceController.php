<?php

namespace App\Controller\Admin;

use App\Entity\Employee;
use App\Repository\EmployeeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TableCompetenceController extends AbstractController
{
    #[Route('/table-of-competence', name: 'tableCompetence')]
    public function index(EmployeeRepository $employeeRepository): Response
    {
        $employees = $employeeRepository->findAll();
        return $this->render('tableCompetence/index.html.twig', ['employees'=>$employees]);
    }

    #[Route('/table-of-competence/{id}', name: 'view_table_competence')]
    public function view(Employee $employee): Response
    {
        return $this->render('tableCompetence/view.html.twig', ['employee'=>$employee]);
    }
}
