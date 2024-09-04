<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Spaceship;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SpaceshipFixtures extends Fixture
{
    /**
     * @param \Doctrine\Persistence\ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $corvette = $this->setCorvette();
        $frigate = $this->setFrigate();

        $manager->persist($corvette);
        $manager->persist($frigate);

        $manager->flush();
    }

    /**
     * @return \App\Entity\Spaceship
     */
    private function setCorvette(): Spaceship
    {
        $corvette = new Spaceship();
        $corvette->setName("Helios X-21");
        $corvette->setClass("Corvette");
        $corvette->setHp(200);
        $corvette->setArmor(35);
        $corvette->setEnergyShield(35);
        $corvette->setRocketWeapon(55);
        $corvette->setEnergyWeapon(45);
        $corvette->setAccuracy(45);
        $corvette->setInitiative(30);
        $corvette->setDefenceSystem(0);

        return $corvette;
    }

    /**
     * @return \App\Entity\Spaceship
     */
    private function setFrigate(): Spaceship
    {
        $frigate = new Spaceship();
        $frigate->setName("Vanguard K-3");
        $frigate->setClass("Frigate");
        $frigate->setHp(400);
        $frigate->setArmor(55);
        $frigate->setEnergyShield(55);
        $frigate->setRocketWeapon(75);
        $frigate->setEnergyWeapon(65);
        $frigate->setAccuracy(55);
        $frigate->setInitiative(40);
        $frigate->setDefenceSystem(0);

        return $frigate;
    }
}
