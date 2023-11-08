<?php

namespace App\DataFixtures;
use App\Entity\Info;
use App\Entity\Article;
use App\Entity\Homepage;
use Faker\Factory as Faker;
use App\Entity\OwnerPresentation;
use App\Entity\CustomMadeFormation;
use App\Entity\PartnershipFormation;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker::create('fr_FR');
    
        //Create 4 Custom Made Formation
        $customMadeFormations = [];
        for ($i = 0; $i < 4; $i++){
            $customMadeFormation = new CustomMadeFormation();
            $customMadeFormation->setTitle($faker->title);
            $customMadeFormation->setContent($faker->text);
            $customMadeFormation->setIsActive($faker->boolean);
            $manager->persist($customMadeFormation);
            $customMadeFormations[] = $customMadeFormation;
        }
        //Create 4 Partnership Formation
        $partnershipFormations = [];
        for ($i = 0; $i < 4; $i++){
            $partnershipFormation = new PartnershipFormation();
            $partnershipFormation->setTitle($faker->title);
            $partnershipFormation->setContent($faker->text);
            $partnershipFormation->setIsActive($faker->boolean);
            $manager->persist($partnershipFormation);
            $partnershipFormations[] = $partnershipFormation;
        }
        //Create 4 Owner Presentation
        $ownerPresentations = [];
        for ($i = 0; $i < 4; $i++){
            $ownerPresentation = new OwnerPresentation();
            $ownerPresentation->setShortPresentation($faker->title);
            $ownerPresentation->setRole('Consulante Formatrice');
            $ownerPresentation->setImage($faker->text);
            $ownerPresentation->setIsActive($faker->boolean);
            $manager->persist($ownerPresentation);
            $ownerPresentations[] = $ownerPresentation;
        }
        // Create Homepage
        $homepages = [];
        foreach(['FLJ'] as $value){
            $homepage = new Homepage();
            $homepage->setTitle($value);
            $homepage->setImage($faker->text);
            $homepage->setIsActive($faker->boolean);
            $manager->persist($homepage);
            $homepages[] = $homepage;
        }
        
        $manager->flush();
    }
}
