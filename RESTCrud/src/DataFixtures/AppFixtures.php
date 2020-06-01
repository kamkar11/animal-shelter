<?php

namespace App\DataFixtures;

use App\Entity\Animal;
use App\Entity\Race;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $this->loadRace($manager);
        $this->loadUser($manager);
//        $this->loadComments($manager);
        $this->loadAnimals($manager);
    }

    public function loadRace(ObjectManager $manager){
        $race = new Race();
        $race->setRaceName('dog');

        $this->addReference('race_dog',$race);

        $manager->persist($race);

        $race = new Race();
        $race->setRaceName('cat');

        $this->addReference('race_cat',$race);

        $manager->persist($race);

        $manager->flush();

    }

    public function loadUser(ObjectManager $manager){
        $user = new User();
        $user->setUsername('adam123');
        $user->setEmail('adam123@gmail.com');
        $user->setPassword('123');
        $user->setCompanyName('Aliceson');

        $this->addReference('user_adam', $user);

        $manager->persist($user);
        $manager->flush();

    }

    public function loadComments(ObjectManager $manager){


        $manager->flush();
    }

    public function loadAnimals(ObjectManager $manager){

        $race_dog = $this->getReference('race_dog');
        $race_cat = $this->getReference('race_cat');
        $user = $this->getReference('user_adam');

        $animal = new Animal();
        $animal->setName('Andy');
        $animal->setBiography('apiurfgpiua pgahr pgape rpbe gpiersb piebsr gpiebgrpig brespig b');
        $animal->setRace($race_dog);
        $animal->setOwner($user);
//        $animal->setRace('dog');

        $manager->persist($animal);

        $animal = new Animal();
        $animal->setName('Poly');
        $animal->setBiography('dghjsh sryh sthy srthsrthy  rtyh srthy srthy rsth srth rtsh rt');
        $animal->setRace($race_cat);
        $animal->setOwner($user);
//        $animal->setRace('cat');

        $manager->persist($animal);

        $manager->flush();
    }

}
