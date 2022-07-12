<?php

namespace App\Controller\Admin;

use App\Entity\ExpectationLevel;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

class ExpectationLevelCrudController extends AbstractCrudController
{
    private const SCORES = [
        'Нет знаний' => ExpectationLevel::SCORE_NO_KNOWLEDGE,
        'Теоретические знания' => ExpectationLevel::SCORE_THEORETICAL_KNOWLEDGE,
        'Есть опыт' => ExpectationLevel::SCORE_HAVE_EXPERIENCE,
        'Профи' => ExpectationLevel::SCORE_PROFICIENT,
        'Гуру' => ExpectationLevel::SCORE_GURU,
    ];

    public static function getEntityFqcn(): string
    {
        return ExpectationLevel::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('competence')->setRequired(true),
            ChoiceField::new('score')
                ->setChoices(self::SCORES)
                ->renderExpanded(),
        ];
    }
}
