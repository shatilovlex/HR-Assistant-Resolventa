<?php

namespace App\Controller\Admin;

use App\Entity\ExpectationLevel;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class ExpectationLevelCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ExpectationLevel::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('competence'),
            IdField::new('score'),
        ];
    }
}
