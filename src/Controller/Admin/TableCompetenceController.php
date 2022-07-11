<?php

namespace App\Controller\Admin;

use App\Repository\GroupCompetenceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TableCompetenceController extends AbstractController
{
    #[Route('/table-of-competence', name: 'tableCompetence')]
    public function index(GroupCompetenceRepository $groupCompetenceRepository): Response
    {
        $groupCompetencies = $groupCompetenceRepository->findAll();
        return $this->render('tableCompetence/index.html.twig', ['groupCompetencies'=>$groupCompetencies]);
    }



}