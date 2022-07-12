<?php

namespace App\Controller\Admin;

use App\Entity\ExpectationLevel;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

class ExpectationLevelCrudController extends AbstractCrudController
{
    private const SCORES = [
        'Нет знаний' => 0,
        'Теоретические знания'=> 1,
        'Есть опыт'=> 2,
        'Профи'=> 3,
        'Гуру'=> 4,
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
