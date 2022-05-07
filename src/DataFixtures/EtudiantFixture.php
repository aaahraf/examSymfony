<?php

namespace App\DataFixtures;

use App\Entity\Etudiant;

use App\Entity\Section;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
class EtudiantFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker =Factory::create('fr');
        for ($i=0;$i<20;$i++){
            $etudiant = new Etudiant() ;

            $etudiant-> setPrenom($faker->firstName);
            $etudiant-> setNom($faker->lastName);
//            {% if $i is even  %}
//
//
//
//               $etudiant->setSection(APP/ENTITY/Section::class)
//
//             {% endif%}
            $manager->persist($etudiant);



        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
