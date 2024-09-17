<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\EnergyShield;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EnergyShieldFixtures extends Fixture
{
    /**
     * Loads EnergyShield data fixtures into the database.
     * This method creates three energyShield types (Aegis, Aurora, Atlas),
     * persists them to the ObjectManager and flushes the changes.
     *
     * @param \Doctrine\Persistence\ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $aegis = $this->setAegis();
        $aurora = $this->setAurora();
        $atlas = $this->setAtlas();

        $manager->persist($aegis);
        $manager->persist($aurora);
        $manager->persist($atlas);

        $manager->flush();
    }

    /**
     * Creates and returns the Aegis energyShield entity with a predefined name,
     * description, modifier, and cost.
     *
     * @return \App\Entity\EnergyShield
     */
    private function setAegis(): EnergyShield
    {
        $aegis = new EnergyShield();
        $aegis->setName("Aegis");
        $aegis->setDescription("Aegis is a highly advanced energy shield that creates a powerful protective field around the unit. It is particularly effective against all forms of energy weapons, absorbing and dispersing the energy of enemy attacks. Grants +10 to Energy Shield");
        $aegis->setModifier(15);
        $aegis->setCost(100);

        return $aegis;
    }

    /**
     * Creates and returns the Aurora energyShield entity with a predefined name,
     * description, modifier, and cost.
     *
     * @return \App\Entity\EnergyShield
     */
    private function setAurora(): EnergyShield
    {
        $aurora = new EnergyShield();
        $aurora->setName("Aurora");
        $aurora->setDescription("The Aurora shield is designed for dynamic battles, where speed of reaction is key. Aurora can automatically adjust its protective field to changing conditions on the battlefield. Grants +25 to Energy Shield");
        $aurora->setModifier(30);
        $aurora->setCost(200);

        return $aurora;
    }

    /**
     * Creates and returns the Atlas energyShield entity with a predefined name,
     * description, modifier, and cost.
     *
     * @return \App\Entity\EnergyShield
     */
    private function setAtlas(): EnergyShield
    {
        $atlas = new EnergyShield();
        $atlas->setName("Atlas");
        $atlas->setDescription("Atlas is an incredibly powerful energy shield, inspired by the mythical titan who held the sky on his shoulders. This shield creates a dense and incredibly durable protective field, capable of withstanding the most destructive energy weapon attacks. Thanks to advanced regeneration technology, the Atlas shield quickly renews its power, providing long-lasting protection even during intense battles. Grants +45 Energy Shield");
        $atlas->setModifier(45);
        $atlas->setCost(400);

        return $atlas;
    }
}
