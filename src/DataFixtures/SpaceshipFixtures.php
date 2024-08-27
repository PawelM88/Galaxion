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
        $corvette->setBaseHp(200);
        $corvette->setBaseArmor(35);
        $corvette->setBaseEnergyShield(35);
        $corvette->setBaseRocketWeapon(55);
        $corvette->setBaseEnergyWeapon(45);
        $corvette->setBaseAccuracy(45);
        $corvette->setBaseInitiative(30);

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
        $frigate->setBaseHp(400);
        $frigate->setBaseArmor(55);
        $frigate->setBaseEnergyShield(55);
        $frigate->setBaseRocketWeapon(75);
        $frigate->setBaseEnergyWeapon(65);
        $frigate->setBaseAccuracy(55);
        $frigate->setBaseInitiative(40);

        return $frigate;
    }
}
