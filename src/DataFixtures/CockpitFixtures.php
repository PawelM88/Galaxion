<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Cockpit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CockpitFixtures extends Fixture
{
    /**
     * Loads Cockpit data fixtures into the database.
     * This method creates three cockpit types (HawkEye, Griffin, Phantom),
     * persists them to the ObjectManager and flushes the changes.
     *
     * @param \Doctrine\Persistence\ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $hawkEye = $this->setHawkEye();
        $griffin = $this->setGriffin();
        $phantom = $this->setPhantom();

        $manager->persist($hawkEye);
        $manager->persist($griffin);
        $manager->persist($phantom);

        $manager->flush();
    }

    /**
     * Creates and returns the HawEye cockpit entity with a predefined name,
     * description, modifier, and cost.
     *
     * @return \App\Entity\Cockpit
     */
    private function setHawkEye(): Cockpit
    {
        $hawkEye = new Cockpit();
        $hawkEye->setName("Hawk Eye");
        $hawkEye->setDescription("The Hawk Eye cockpit features advanced optical and sensor systems that provide the pilot with a crystal clear picture of the battlefield. Aiming assist systems allow the pilot to focus more on the fight, increasing the ship's initiative. Grants +15 to Accuracy");
        $hawkEye->setModifier(15);
        $hawkEye->setCost(100);

        return $hawkEye;
    }

    /**
     * Creates and returns the Griffin cockpit entity with a predefined name,
     * description, modifier, and cost.
     *
     * @return \App\Entity\Cockpit
     */
    private function setGriffin(): Cockpit
    {
        $griffin = new Cockpit();
        $griffin->setName("Griffin");
        $griffin->setDescription("Griffin is a cockpit designed for unit commanders who value a combination of excellent accuracy with maximum control over the battlefield situation. Thanks to the advanced tactical interface, the pilot can simultaneously monitor and manage the activities of multiple systems, as well as quickly respond to dynamically changing conditions. Grants +30 to Accuracy");
        $griffin->setModifier(30);
        $griffin->setCost(200);

        return $griffin;
    }

    /**
     * Creates and returns the Phantom cockpit entity with a predefined name,
     * description, modifier, and cost.
     *
     * @return \App\Entity\Cockpit
     */
    private function setPhantom(): Cockpit
    {
        $phantom = new Cockpit();
        $phantom->setName("Phantom");
        $phantom->setDescription("The Phantom cockpit is designed for stealth missions where surprise and precision strike are the priority. Specially designed screens and interfaces respond to the pilot's slightest movements, allowing for rapid adaptation to unpredictable situations. Grants +45 to Accuracy");
        $phantom->setModifier(45);
        $phantom->setCost(400);

        return $phantom;
    }
}
