<?php

namespace App\Controller\Admin;

use App\Entity\EmployeePosition;
use App\Entity\ExpectationLevel;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

class EmployeePositionCrudController extends AbstractCrudController
{
    private const FINAL_SCORES = [
        'No knowledge' => ExpectationLevel::SCORE_NO_KNOWLEDGE,
        'Theoretical knowledge' => ExpectationLevel::SCORE_THEORETICAL_KNOWLEDGE,
        'Have experience' => ExpectationLevel::SCORE_HAVE_EXPERIENCE,
        'Proficient' => ExpectationLevel::SCORE_PROFICIENT,
        'Guru' => ExpectationLevel::SCORE_GURU,
    ];

    public static function getEntityFqcn(): string
    {
        return EmployeePosition::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('employee')->setRequired(true),
            AssociationField::new('expectationLevel')->setRequired(true),
            ChoiceField::new('finalScore')
                ->setChoices(self::FINAL_SCORES)
                ->renderExpanded(),
        ];
    }
}
