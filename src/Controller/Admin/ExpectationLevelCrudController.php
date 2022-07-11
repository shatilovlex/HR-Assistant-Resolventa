<?php

namespace App\Controller\Admin;

use App\Entity\ExpectationLevel;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ExpectationLevelCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ExpectationLevel::class;
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
