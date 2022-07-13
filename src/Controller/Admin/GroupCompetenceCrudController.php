<?php

namespace App\Controller\Admin;

use App\Entity\GroupCompetence;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class GroupCompetenceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return GroupCompetence::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
        ];
    }
}
