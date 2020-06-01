<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $animal = new Animal();
        $animal->setName('Andy');
        $animal->setBiography('apiurfgpiua pgahr pgape rpbe gpiersb piebsr gpiebgrpig brespig b');
        $animal->setRace('dog');

        $manager->persist($animal);

        $animal = new Animal();
        $animal->setName('Poly');
        $animal->setBiography('dghjsh sryh sthy srthsrthy  rtyh srthy srthy rsth srth rtsh rt');
        $animal->setRace('cat');

        $manager->persist($animal);

        $manager->flush();
    }
}
