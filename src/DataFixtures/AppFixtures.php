<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Spot;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    private function encode($user, $plaintextpassword)
    {
        return $this->passwordEncoder->encodePassword(
            $user,
            $plaintextpassword
        );
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setNickname($faker->firstName());
            $user->setPassword($this->encode($user, "toto"));
            $user->setAvatar($faker->imageUrl());
            $user->setRoles(["USER_ROLE"]);
            $manager->persist($user);
        }

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
