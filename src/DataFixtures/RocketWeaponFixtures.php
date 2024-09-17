<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\RocketWeapon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RocketWeaponFixtures extends Fixture
{
    /**
     * Loads RocketWeapon data fixtures into the database.
     * This method creates three rocketWeapon types (Hermes, Eris, Apollo),
     * persists them to the rocketWeapon and flushes the changes.
     *
     * @param \Doctrine\Persistence\ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $minotaur = $this->setMinotaur();
        $harpy = $this->setHarpy();
        $typhon = $this->setTyphon();

        $manager->persist($minotaur);
        $manager->persist($harpy);
        $manager->persist($typhon);

        $manager->flush();
    }

    /**
     * Creates and returns the Minotaur rocketWeapon entity with a predefined name,
     * description, modifier, and cost.
     *
     * @return \App\Entity\RocketWeapon
     */
    private function setMinotaur(): RocketWeapon
    {
        $minotaur = new RocketWeapon();
        $minotaur->setName("Minotaur");
        $minotaur->setDescription("The Minotaur RocketWeapon is an advanced protective system designed to absorb and disperse the energy of rocket explosions. The RocketWeapon structure consists of absorbing layers that effectively reduce the force of the explosion and minimize damage. Grants +10 to Rocket Weapon");
        $minotaur->setModifier(15);
        $minotaur->setCost(100);

        return $minotaur;
    }

    /**
     * Creates and returns the Harpy rocketWeapon entity with a predefined name,
     * description, modifier, and cost.
     *
     * @return \App\Entity\RocketWeapon
     */
    private function setHarpy(): RocketWeapon
    {
        $harpy = new RocketWeapon();
        $harpy->setName("Harpy");
        $harpy->setDescription("Harpy is a fast and agile missile designed to destroy air targets and fast-moving units. Thanks to its advanced guidance system, these missiles can track and hit even the most mobile targets. Grants +25 to Rocket Weapon");
        $harpy->setModifier(30);
        $harpy->setCost(200);

        return $harpy;
    }

    /**
     * Creates and returns the Typhon rocketWeapon entity with a predefined name,
     * description, modifier, and cost.
     *
     * @return \App\Entity\RocketWeapon
     */
    private function setTyphon(): RocketWeapon
    {
        $typhon = new RocketWeapon();
        $typhon->setName("Typhon");
        $typhon->setDescription("The Typhon is a multi-warhead missile system that, when launched, splits into smaller sub-missiles, each targeting a different part of the ship's hull. These missiles are equipped with jamming systems that make it difficult for an enemy to shoot them down or avoid them. Grants +45 Rocket Weapon");
        $typhon->setModifier(45);
        $typhon->setCost(400);

        return $typhon;
    }
}
