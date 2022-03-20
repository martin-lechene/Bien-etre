<?php

namespace App\Controller\Admin;

use App\Entity\Categorys;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CategorysCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Categorys::class;
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
