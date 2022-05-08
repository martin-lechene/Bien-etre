<?php

namespace App\DataFixtures;
// Entity
use App\Entity\User;
use App\Entity\Prestataires;
// Factory 
use App\Factory\UserFactory;
use App\Factory\ImagesFactory;
use App\Factory\SlidersFactory;
use App\Factory\ServicesFactory;
use App\Factory\CategorysFactory;
use App\Entity\CategorieDeServices;
use App\Factory\PrestatairesFactory;
// Doctrine
use Doctrine\Persistence\ObjectManager;
// Fixture
use App\Factory\CategorieDeServicesFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        UserFactory::createMany(10);


        SlidersFactory::createMany(4);

        //PrestatairesFactory::createMany(30);

        // Create specify user
        for ($count = 0; $count < 10; $count++) {
            $user = new User();
            $user -> setEmail("exemple." . $count . ".prestataire@gmail.com");
            $user -> setIsVerified(true);
            $user -> setRoles(["ROLE_USER", "ROLE_PRESTATAIRE"]);
            $user -> setPassword("$2y$13\$TZcTf4zLc2V/iybLjVP3hu4nvZy6fcBuX/F0XHwKNOsYreC1gdTEO");
            $user -> setInscription(new \DateTime());
            $user -> setTypeUtilisateur(1);
            $user -> setNbEssaisInfructueux(0);
            $user -> setBanni(false);
            $user -> setInscriptConfirm(false);
            $user -> setPrice(false);
            $manager->persist($user);
        }
        for ($count = 0; $count < 10; $count++) {
            $user = new User();
            $user -> setEmail("exemple." . $count . ".internaute@gmail.com");
            $user -> setIsVerified(true);
            $user -> setRoles(["ROLE_USER", "ROLE_INTERNAUTE"]);
            $user -> setPassword("$2y$13\$TZcTf4zLc2V/iybLjVP3hu4nvZy6fcBuX/F0XHwKNOsYreC1gdTEO");
            $user -> setInscription(new \DateTime());
            $user -> setTypeUtilisateur(1);
            $user -> setNbEssaisInfructueux(0);
            $user -> setBanni(false);
            $user -> setInscriptConfirm(true);
            $user -> setPrice(false);
            $manager->persist($user);
        }
        for ($count = 10; $count < 20; $count++) {
            $user = new User();
            $user -> setEmail("exemple." . $count . "@gmail.com");
            $user -> setIsVerified(false);
            $user -> setRoles(["ROLE_USER", "ROLE_PRESTATAIRE"]);
            $user -> setPassword("$2y$13\$TZcTf4zLc2V/iybLjVP3hu4nvZy6fcBuX/F0XHwKNOsYreC1gdTEO");
            $user -> setInscription(new \DateTime());
            $user -> setTypeUtilisateur(1);
            $user -> setNbEssaisInfructueux(0);
            $user -> setBanni(false);
            $user -> setInscriptConfirm(true);
            $user -> setPrice(false);
            $manager->persist($user);
        }
        for ($count = 20; $count < 30; $count++) {
            $user = new User();
            $user -> setEmail("exemple." . $count . ".admin@gmail.com");
            $user -> setIsVerified(true);
            $user -> setRoles(["ROLE_USER", "ROLE_PRESTATAIRE"]);
            $user -> setPassword("$2y$13\$TZcTf4zLc2V/iybLjVP3hu4nvZy6fcBuX/F0XHwKNOsYreC1gdTEO");
            $user -> setInscription(new \DateTime());
            $user -> setTypeUtilisateur(1);
            $user -> setNbEssaisInfructueux(0);
            $user -> setBanni(false);
            $user -> setInscriptConfirm(false);
            $user -> setPrice(false);
            $manager->persist($user);
        }

        // Create specify prestataires
        
            $prestataires = new Prestataires();
            $prestataires -> setName("Prestataire " . $count);
            $prestataires -> setWebsite("www.prestataire" . $count . ".com");
            $prestataires -> setNumberPhone("049" . $count . " " . $count . $count . $count . $count);
            $prestataires -> setNumberTva("#".$count . " " . $count . $count . $count . $count);
            $prestataires -> setUrlLogo("https://prestataire" . $count . ".com/logo.png");
            $prestataires -> setDescShort("Prestataire " . $count . " est un prestataire de services");
            $prestataires -> setDescLong("Prestataire " . $count . " est un prestataire de services, il se peut qu'on soit au numéro " . $count . ".");
            $prestataires -> setDateCreate(new \DateTime());
            $prestataires -> setIsPublic(rand(0, 1));
            $prestataires -> setPrice(rand(1, 100));
            $prestataires -> setCategoryService("Categorie n°" . $count);
            //$prestataire -> setNumStreet(rand(1,53) . $count . $count . $count . $count);
            $prestataires -> setNameSteet("Rue de la toison d'or, " . $count);
            $prestataires -> setNameCity("Lyon " . $count);
            $prestataires -> setCountry("France");
            $prestataires -> setNumPostal("69" . $count . $count . $count . $count);
            $prestataires -> setNumLike(rand(0, 100));
            $prestataires -> setNumComment(rand(0, 100)); 
            // $prestataire -> setUser($manager->getRepository(User::class)->find($count));

            $manager->persist($prestataires);

            $manager->flush();
    }
}