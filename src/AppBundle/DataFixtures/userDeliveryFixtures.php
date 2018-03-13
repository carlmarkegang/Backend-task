<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\User;
use AppBundle\Entity\Delivery;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class userDeliveryFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        // composer require --dev doctrine/doctrine-fixtures-bundle
        // php bin/console doctrine:fixtures:load
        $this->createUser('user1',$manager);
        $this->createUser('user2',$manager);
    }

    public function createUser($username, ObjectManager $manager){
        $user = new User();
        $user->setUsername($username);
        $manager->persist($user);
        $manager->flush();
        $this->createDelivery('delivery' . $user->getId(), $user, $manager);
        $this->createDelivery('delivery' . $user->getId(), $user, $manager);
    }

    public function createDelivery($description, $user, ObjectManager $manager){
        $delivery = new Delivery();
        $delivery->setDescription($description);
        $delivery->setUser($user);
        $manager->persist($delivery);
        $manager->flush();
    }

}