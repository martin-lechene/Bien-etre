<?php

namespace Sliders;

use App\Entity\Sliders;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SlidersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Sliders::class;
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
