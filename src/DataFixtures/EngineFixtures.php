<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Engine;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EngineFixtures extends Fixture
{
    /**
     * Loads Engine data fixtures into the database.
     * This method creates three engine types (Hermes, Eris, Apollo),
     * persists them to the engine and flushes the changes.
     *
     * @param \Doctrine\Persistence\ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $hermes = $this->setHermes();
        $eris = $this->setEris();
        $apollo = $this->setApollo();

        $manager->persist($hermes);
        $manager->persist($eris);
        $manager->persist($apollo);

        $manager->flush();
    }

    /**
     * Creates and returns the Hermes engine entity with a predefined name,
     * description, modifier, and cost.
     *
     * @return \App\Entity\Engine
     */
    private function setHermes(): Engine
    {
        $hermes = new Engine();
        $hermes->setName("Hermes");
        $hermes->setDescription("The Hermes Engine is an advanced protective system designed to absorb and disperse the energy of rocket explosions. The Engine structure consists of absorbing layers that effectively reduce the force of the explosion and minimize damage. Grants +5 to Initiative");
        $hermes->setModifier(15);
        $hermes->setCost(100);

        return $hermes;
    }

    /**
     * Creates and returns the Eris engine entity with a predefined name,
     * description, modifier, and cost.
     *
     * @return \App\Entity\Engine
     */
    private function setEris(): Engine
    {
        $eris = new Engine();
        $eris->setName("Eris");
        $eris->setDescription("Eris is an engine designed for unpredictable and aggressive maneuvers. Equipped with modern control and stabilization systems, it allows for instant acceleration and lightning-fast turns, which significantly increases the unit's initiative on the battlefield. Grants +15 to Initiative");
        $eris->setModifier(30);
        $eris->setCost(200);

        return $eris;
    }

    /**
     * Creates and returns the Apollo engine entity with a predefined name,
     * description, modifier, and cost.
     *
     * @return \App\Entity\Engine
     */
    private function setApollo(): Engine
    {
        $apollo = new Engine();
        $apollo->setName("Apollo");
        $apollo->setDescription("The Apollo engine is an advanced power unit that combines high speed with excellent vehicle control. Optimized for long-term operations, it allows the unit to maneuver quickly and smoothly even in difficult conditions. Grants +30 to Initiative");
        $apollo->setModifier(45);
        $apollo->setCost(400);

        return $apollo;
    }
}
