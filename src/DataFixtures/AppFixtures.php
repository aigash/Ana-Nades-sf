<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Spot;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($j = 0; $j < 10; $j++) {
            $oneSpot = new Spot();
            $oneSpot->setCreatedAt($faker->dateTime($max = 'now', $timezone = null));
            $oneSpot->setTitle($faker->word());
            $oneSpot->setContent($faker->word());
            $oneSpot->setUrlPos($faker->imageUrl(640, 480, "cats", true, null, true));
            $oneSpot->setUrlAim($faker->imageUrl(640, 480, "cats", true, null, true));
            $oneSpot->setUrlLand($faker->imageUrl(640, 480, "cats", true, null, true));
            $manager->persist($oneSpot);
        }

        $manager->flush();
    }
}
