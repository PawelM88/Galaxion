<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Foe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FoeFixtures extends Fixture
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
     * @return \App\Entity\Foe
     */
    private function setPirates(): Foe
    {
        $pirates = new Foe();
        $pirates->setName("Neptune's Corsairs");
        $pirates->setClass("Pirate");
        $pirates->setDescription("Elite pirates operating on the outskirts of planetary systems, armed with advanced black market technology. Masters of ambushes and fast raids, they strike without mercy. Their ships are swift but lack strong defenses, making them dangerous yet vulnerable to concentrated counterattacks");
        $pirates->setHp(200);
        $pirates->setArmor(20);
        $pirates->setEnergyShield(15);
        $pirates->setRocketWeapon(50);
        $pirates->setEnergyWeapon(45);
        $pirates->setAccuracy(40);
        $pirates->setInitiative(45);
        $pirates->setDefenceSystem(0);

        return $pirates;
    }

    /**
     * @return \App\Entity\Foe
     */
    private function setSpaceParasites(): Foe
    {
        $spaceParasites = new Foe();
        $spaceParasites->setName("Space Parasites");
        $spaceParasites->setClass("Parasite");
        $spaceParasites->setDescription("Small ships infected by alien parasites, attacking anything in sight. Weak in defense but deadly in numbers, they swarm their targets, overwhelming them through sheer mass. Ignoring them can be catastrophic as their numbers and attacks grow");
        $spaceParasites->setHp(200);
        $spaceParasites->setArmor(15);
        $spaceParasites->setEnergyShield(20);
        $spaceParasites->setRocketWeapon(45);
        $spaceParasites->setEnergyWeapon(50);
        $spaceParasites->setAccuracy(40);
        $spaceParasites->setInitiative(45);
        $spaceParasites->setDefenceSystem(0);

        return $spaceParasites;
    }

    /**
     * @return \App\Entity\Foe
     */
    private function setBountyHunters(): Foe
    {
        $bountyHunters = new Foe();
        $bountyHunters->setName("Bounty Hunters");
        $bountyHunters->setClass("Hunter");
        $bountyHunters->setDescription("Elite mercenaries hired by a mysterious organization to eliminate targets. Equipped with advanced ships and unique defensive modules, they are extremely hard to defeat. Their weaponry and tactical systems make every encounter a strategic challenge");
        $bountyHunters->setHp(200);
        $bountyHunters->setArmor(55);
        $bountyHunters->setEnergyShield(50);
        $bountyHunters->setRocketWeapon(70);
        $bountyHunters->setEnergyWeapon(65);
        $bountyHunters->setAccuracy(75);
        $bountyHunters->setInitiative(65);
        $bountyHunters->setDefenceSystem(10);

        return $bountyHunters;
    }

    /**
     * @return \App\Entity\Foe
     */
    private function setRebelRobots(): Foe
    {
        $rebelRobots = new Foe();
        $rebelRobots->setName("Rebel Robots");
        $rebelRobots->setClass("Robot");
        $rebelRobots->setDescription("Once used for space exploration, now malfunctioning and unpredictable. Though they lack advanced weaponry, their erratic behavior and resistance to traditional attacks make them dangerous. They target ships randomly, driven by corrupted programming");
        $rebelRobots->setHp(200);
        $rebelRobots->setArmor(50);
        $rebelRobots->setEnergyShield(55);
        $rebelRobots->setRocketWeapon(65);
        $rebelRobots->setEnergyWeapon(70);
        $rebelRobots->setAccuracy(75);
        $rebelRobots->setInitiative(65);
        $rebelRobots->setDefenceSystem(10);

        return $rebelRobots;
    }

    /**
     * @return \App\Entity\Foe
     */
    private function setInsectoids(): Foe
    {
        $insectoids = new Foe();
        $insectoids->setName("Insectoids");
        $insectoids->setClass("Insectoid");
        $insectoids->setDescription("An aggressive, insect-like alien race seeking to dominate the galaxy. Their organic ships are incredibly fast, equipped with bio-missiles that are difficult to counter. Known for their brutal attacks and resistance to conventional defense systems, they are relentless Foe");
        $insectoids->setHp(200);
        $insectoids->setArmor(65);
        $insectoids->setEnergyShield(70);
        $insectoids->setRocketWeapon(80);
        $insectoids->setEnergyWeapon(95);
        $insectoids->setAccuracy(95);
        $insectoids->setInitiative(90);
        $insectoids->setDefenceSystem(15);

        return $insectoids;
    }

    /**
     * @return \App\Entity\Foe
     */
    private function setProphetCruiser(): Foe
    {
        $prophetCruiser = new Foe();
        $prophetCruiser->setName("Prophet Cruiser");
        $prophetCruiser->setClass("Prophet");
        $prophetCruiser->setDescription("A fanatical sect believing in the universe's end, attacking anyone in their way. Their powerful ships are equipped with ancient technology, capable of disrupting enemy navigation systems. They fight with a fierce devotion to their apocalyptic beliefs, making them relentless adversaries");
        $prophetCruiser->setHp(200);
        $prophetCruiser->setArmor(70);
        $prophetCruiser->setEnergyShield(65);
        $prophetCruiser->setRocketWeapon(95);
        $prophetCruiser->setEnergyWeapon(80);
        $prophetCruiser->setAccuracy(95);
        $prophetCruiser->setInitiative(90);
        $prophetCruiser->setDefenceSystem(15);

        return $prophetCruiser;
    }
}
