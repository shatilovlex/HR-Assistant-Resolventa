<?php

namespace App\Controller\Admin;

use App\Entity\GroupCompetence;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class GroupCompetenceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return GroupCompetence::class;
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
