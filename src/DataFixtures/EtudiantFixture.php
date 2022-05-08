<?php

namespace App\DataFixtures;
use App\Entity\Etudiant;
use App\Repository\EtudiantRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class EtudiantFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr');

        for($i=1; $i<11; $i++){
            $var = new Etudiant();
            $var->setNom($faker->firstName );
            $var->setPrenom( $faker->lastName);

            $manager->persist($var);}

        $manager->flush();
    }
}
