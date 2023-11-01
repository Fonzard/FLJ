<?php

namespace App\DataFixtures;
use App\Entity\Info;
use App\Entity\Article;
use App\Entity\Homepage;
use Faker\Factory as Faker;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Faker::create('fr_FR');

        //Create 5 articles
        $articles = [];
        for ($i = 0; $i < 5; $i++){
            $article = new Article();
            $article->setName($faker->name);
            $article->setDescription($faker->text);
            $article->setDate($faker->dateTime());
            $article->setImage($faker->text);
            $manager->persist($article);
            $articles[] = $article;
        }
        
        //Create 4 infos
        $infos = [];
        foreach(['Contact', 'Lieu', 'Horaire', 'Avis'] as $value){
            $info = new Info();
            $info->setTitle($value);
            $info->setDetail($faker->text);
            $manager->persist($info);
            $infos[] = $info;
        }

        // Create Homepage
        $homepages = [];
        foreach(['FLJ'] as $value){
            $homepage = new Homepage();
            $homepage->setTitle($value);
            $homepage->setImage($faker->text);
            $manager->persist($homepage);
            $homepages[] = $homepage;
        }
        
        $manager->flush();
    }
}
