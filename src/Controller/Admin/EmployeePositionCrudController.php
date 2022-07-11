<?php

namespace App\Controller\Admin;

use App\Entity\EmployeePosition;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

class EmployeePositionCrudController extends AbstractCrudController
{
    private const FINALSCORES = [
        'Нет знаний' => 0,
        'Теоретические знания'=> 1,
        'Есть опыт'=> 2,
        'Профи'=> 3,
        'Гуру'=> 4,
    ];

    public static function getEntityFqcn(): string
    {
        return EmployeePosition::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('employee'),
            AssociationField::new('expectationLevel'),
            ChoiceField::new('finalScore')
                ->setChoices(self::FINALSCORES)
                ->renderExpanded(),
        ];
    }
}
