<?php

namespace App\DataFixtures;
use App\Entity\Article;
use App\Entity\Info;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as Faker;

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
            $manager->persist($article);
            $articles[] = $article;
        }
        
        //Create 5 infos
        $infos = [];
        foreach(['Contact', 'Lieu', 'Horaire', 'Avis'] as $value){
            $info = new Info();
            $info->setTitle($value);
            $info->setDetail($faker->text);
            $manager->persist($info);
            $infos[] = $info;
        }
        

        $manager->flush();
    }
}
