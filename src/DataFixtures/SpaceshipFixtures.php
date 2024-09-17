<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Spaceship;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SpaceshipFixtures extends Fixture
{
    /**
     * Loads Spaceship data fixtures into the database.
     * This method creates two spaceship types (Corvette, Frigate),
     * persists them to the engine and flushes the changes.
     *
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
     * Creates and returns the Corvette spaceship entity with a predefined name,
     * description, modifier, and cost.
     *
     * @return \App\Entity\Spaceship
     */
    private function setCorvette(): Spaceship
    {
        $corvette = new Spaceship();
        $corvette->setName("Helios X-21");
        $corvette->setClass("Corvette");
        $corvette->setHp(200);
        $corvette->setArmor(15);
        $corvette->setEnergyShield(15);
        $corvette->setRocketWeapon(45);
        $corvette->setEnergyWeapon(45);
        $corvette->setAccuracy(40);
        $corvette->setInitiative(40);
        $corvette->setDefenceSystem(0);
        $corvette->setCost(0);

        return $corvette;
    }

    /**
     * Creates and returns the Frigate spaceship entity with a predefined name,
     * description, modifier, and cost.
     *
     * @return \App\Entity\Spaceship
     */
    private function setFrigate(): Spaceship
    {
        $frigate = new Spaceship();
        $frigate->setName("Vanguard K-3");
        $frigate->setClass("Frigate");
        $frigate->setHp(400);
        $frigate->setArmor(30);
        $frigate->setEnergyShield(30);
        $frigate->setRocketWeapon(55);
        $frigate->setEnergyWeapon(55);
        $frigate->setAccuracy(50);
        $frigate->setInitiative(50);
        $frigate->setDefenceSystem(0);
        $frigate->setCost(1000);

        return $frigate;
    }
}
