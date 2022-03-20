<?php

namespace App\Controller\Admin;

use App\Entity\Prestataires;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PrestatairesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Prestataires::class;
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
