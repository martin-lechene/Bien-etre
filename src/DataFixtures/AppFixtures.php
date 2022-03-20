<?php

namespace App\DataFixtures;

use App\Entity\Services;
use App\Factory\PrestatairesFactory;
use App\Factory\CategorieDeServicesFactory;
use App\Factory\ImagesFactory;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        PrestatairesFactory::createMany(10);
        CategorieDeServicesFactory::createMany(10);
        ImagesFactory::createMany(10);
        ServicesFactory::createMany(10);

        $manager->flush();
    }
}
