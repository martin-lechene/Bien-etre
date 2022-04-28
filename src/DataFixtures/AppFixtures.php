<?php

namespace App\DataFixtures;

use App\Entity\Categorys;
use App\Factory\ImagesFactory;
use App\Factory\SlidersFactory;
use App\Factory\ServicesFactory;
use App\Factory\UsersFactory;
use App\Factory\PrestatairesFactory;
use App\Factory\CategorieDeServicesFactory;
use App\Factory\CodePostalFactory;
use App\Factory\CommuneFactory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // CodePostalFactory::createMany(10);
        // CommuneFactory::createMany(10);
        PrestatairesFactory::createMany(10);
        CategorysFactory::createMany(10);
        CategorieDeServicesFactory::createMany(10);
        // ImagesFactory::createMany(10);
        ServicesFactory::createMany(10);
        SlidersFactory::createMany(10);



        $manager->flush();
    }
}
