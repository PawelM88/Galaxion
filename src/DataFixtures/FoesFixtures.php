<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Foes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FoesFixtures extends Fixture
{
    /**
         * @param \Doctrine\Persistence\ObjectManager $manager
         *
         * @return void
         */
    public function load(ObjectManager $manager): void
    {
        $pirates = $this->setPirates();
        $spaceParasites = $this->setSpaceParasites();
        $bountyHunters = $this->setBountyHunters();
        $rebelRobots = $this->setRebelRobots();
        $insectoids = $this->setInsectoids();
        $prophetsCruiser = $this->setProphetCruiser();

        $manager->persist($pirates);
        $manager->persist($spaceParasites);
        $manager->persist($bountyHunters);
        $manager->persist($rebelRobots);
        $manager->persist($insectoids);
        $manager->persist($prophetsCruiser);

        $manager->flush();
    }

    /**
     * @return \App\Entity\Foes
     */
    private function setPirates(): Foes
    {
        $pirates = new Foes();
        $pirates->setName("Neptune's Corsairs");
        $pirates->setClass("Pirate");
        $pirates->setDescription("Elite pirates operating on the outskirts of planetary systems, armed with advanced black market technology. Masters of ambushes and fast raids, they strike without mercy. Their ships are swift but lack strong defenses, making them dangerous yet vulnerable to concentrated counterattacks");
        $pirates->setHp(200);
        $pirates->setArmor(35);
        $pirates->setEnergyShield(35);
        $pirates->setRocketWeapon(55);
        $pirates->setEnergyWeapon(45);
        $pirates->setAccuracy(50);
        $pirates->setInitiative(30);
        $pirates->setDefenceSystem(0);

        return $pirates;
    }

    /**
     * @return \App\Entity\Foes
     */
    private function setSpaceParasites(): Foes
    {
        $spaceParasites = new Foes();
        $spaceParasites->setName("Space Parasites");
        $spaceParasites->setClass("Parasite");
        $spaceParasites->setDescription("Small ships infected by alien parasites, attacking anything in sight. Weak in defense but deadly in numbers, they swarm their targets, overwhelming them through sheer mass. Ignoring them can be catastrophic as their numbers and attacks grow");
        $spaceParasites->setHp(200);
        $spaceParasites->setArmor(35);
        $spaceParasites->setEnergyShield(35);
        $spaceParasites->setRocketWeapon(55);
        $spaceParasites->setEnergyWeapon(45);
        $spaceParasites->setAccuracy(50);
        $spaceParasites->setInitiative(30);
        $spaceParasites->setDefenceSystem(0);

        return $spaceParasites;
    }

    /**
     * @return \App\Entity\Foes
     */
    private function setBountyHunters(): Foes
    {
        $bountyHunters = new Foes();
        $bountyHunters->setName("Bounty Hunters");
        $bountyHunters->setClass("Hunter");
        $bountyHunters->setDescription("Elite mercenaries hired by a mysterious organization to eliminate targets. Equipped with advanced ships and unique defensive modules, they are extremely hard to defeat. Their weaponry and tactical systems make every encounter a strategic challenge");
        $bountyHunters->setHp(200);
        $bountyHunters->setArmor(55);
        $bountyHunters->setEnergyShield(55);
        $bountyHunters->setRocketWeapon(75);
        $bountyHunters->setEnergyWeapon(65);
        $bountyHunters->setAccuracy(70);
        $bountyHunters->setInitiative(50);
        $bountyHunters->setDefenceSystem(10);

        return $bountyHunters;
    }

    /**
     * @return \App\Entity\Foes
     */
    private function setRebelRobots(): Foes
    {
        $rebelRobots = new Foes();
        $rebelRobots->setName("Rebel Robots");
        $rebelRobots->setClass("Robot");
        $rebelRobots->setDescription("Once used for space exploration, now malfunctioning and unpredictable. Though they lack advanced weaponry, their erratic behavior and resistance to traditional attacks make them dangerous. They target ships randomly, driven by corrupted programming");
        $rebelRobots->setHp(200);
        $rebelRobots->setArmor(55);
        $rebelRobots->setEnergyShield(55);
        $rebelRobots->setRocketWeapon(75);
        $rebelRobots->setEnergyWeapon(65);
        $rebelRobots->setAccuracy(70);
        $rebelRobots->setInitiative(50);
        $rebelRobots->setDefenceSystem(10);

        return $rebelRobots;
    }

    /**
     * @return \App\Entity\Foes
     */
    private function setInsectoids(): Foes
    {
        $insectoids = new Foes();
        $insectoids->setName("Insectoids");
        $insectoids->setClass("Insectoid");
        $insectoids->setDescription("An aggressive, insect-like alien race seeking to dominate the galaxy. Their organic ships are incredibly fast, equipped with bio-missiles that are difficult to counter. Known for their brutal attacks and resistance to conventional defense systems, they are relentless foes");
        $insectoids->setHp(200);
        $insectoids->setArmor(75);
        $insectoids->setEnergyShield(75);
        $insectoids->setRocketWeapon(95);
        $insectoids->setEnergyWeapon(85);
        $insectoids->setAccuracy(90);
        $insectoids->setInitiative(70);
        $insectoids->setDefenceSystem(10);

        return $insectoids;
    }

    /**
     * @return \App\Entity\Foes
     */
    private function setProphetCruiser(): Foes
    {
        $prophetCruiser = new Foes();
        $prophetCruiser->setName("Prophet Cruiser");
        $prophetCruiser->setClass("Prophet");
        $prophetCruiser->setDescription("A fanatical sect believing in the universe's end, attacking anyone in their way. Their powerful ships are equipped with ancient technology, capable of disrupting enemy navigation systems. They fight with a fierce devotion to their apocalyptic beliefs, making them relentless adversaries");
        $prophetCruiser->setHp(200);
        $prophetCruiser->setArmor(75);
        $prophetCruiser->setEnergyShield(75);
        $prophetCruiser->setRocketWeapon(95);
        $prophetCruiser->setEnergyWeapon(85);
        $prophetCruiser->setAccuracy(90);
        $prophetCruiser->setInitiative(70);
        $prophetCruiser->setDefenceSystem(10);

        return $prophetCruiser;
    }
}
