<?php

namespace App\Controller\Admin;

use App\Entity\Employee;
use App\Entity\ExpectationLevel;
use App\Repository\EmployeeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TableCompetenceController extends AbstractController
{
    private const SCORES = [
        ExpectationLevel::SCORE_NO_KNOWLEDGE => 'No knowledge',
        ExpectationLevel::SCORE_THEORETICAL_KNOWLEDGE => 'Theoretical knowledge',
        ExpectationLevel::SCORE_HAVE_EXPERIENCE => 'Have Experience',
        ExpectationLevel::SCORE_PROFICIENT => 'Proficient',
        ExpectationLevel::SCORE_GURU => 'Guru',
    ];

    #[Route('/table-of-competence', name: 'tableCompetence')]
    public function index(EmployeeRepository $employeeRepository): Response
    {
        $employees = $employeeRepository->findAll();
        return $this->render('tableCompetence/index.html.twig', ['employees'=>$employees]);
    }

    #[Route('/table-of-competence/{id}', name: 'view_table_competence')]
    public function view(Employee $employee): Response
    {
        $scores= $this->getScores();
        return $this->render('tableCompetence/view.html.twig', ['employee'=>$employee, 'scores'=>$scores]);
    }

    private function getScores(): array
    {
        return self::SCORES;
    }
}
