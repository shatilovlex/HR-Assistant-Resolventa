<?php

namespace App\Controller\Admin;

use App\Entity\EmployeePosition;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EmployeePositionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EmployeePosition::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
