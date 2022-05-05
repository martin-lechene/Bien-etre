<?php

namespace App\Faker;

use Faker\Provider\Base;

class PrestatairesProvider extends Base
{
    const CATEGORYS = [
        'Categorie 1',
        'Categorie 2',
        'Categorie 3',
        'Categorie 4',
        'Categorie 5',
        'Categorie 6',
        'Categorie 7',
    ];

    public function prestatairesCategorys()
    {
        return self::randomElement(self::CATEGORYS);
    }

}