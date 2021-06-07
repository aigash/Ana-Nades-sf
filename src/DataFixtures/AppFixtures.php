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

        $nbPostsToCreate = random_int(0, 10);

        for ($j = 0; $j < $nbPostsToCreate; $j++) {
            $onePost = new Spot();
            $onePost->setCreatedAt($faker->dateTime($max = 'now', $timezone = null));
            $onePost->setTitle($faker->word());
            $onePost->setContent($faker->word());
            $onePost->setUrlPos($faker->imageUrl(640, 480, "cats", true, null, true));
            $onePost->setUrlAim($faker->imageUrl(640, 480, "cats", true, null, true));
            $onePost->setUrlLand($faker->imageUrl(640, 480, "cats", true, null, true));
        }

        $manager->flush();
    }
}
