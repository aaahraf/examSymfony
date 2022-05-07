<?php

namespace App\DataFixtures;

use App\Entity\Section;
use ContainerIsNFktn\getSectionRepositoryService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class SectionFixture extends Fixture
{


    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr');

        for($i=1; $i<10; $i++){
            $var = new Section();
            $var->setDesignation("SECTION $i" );




            $manager->persist($var);
        }

        $manager->flush();
    }
}