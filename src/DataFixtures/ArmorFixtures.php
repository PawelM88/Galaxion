<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Armor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArmorFixtures extends Fixture
{
    /**
     * @param \Doctrine\Persistence\ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $kraken = $this->setKraken();
        $medusa = $this->setMedusa();
        $titan = $this->setTitan();

        $manager->persist($kraken);
        $manager->persist($medusa);
        $manager->persist($titan);

        $manager->flush();
    }

    /**
     * @return \App\Entity\Armor
     */
    private function setKraken(): Armor
    {
        $kraken = new Armor();
        $kraken->setName("Kraken");
        $kraken->setDescription("The Kraken armor is an advanced protective system designed to absorb and disperse the energy of rocket explosions. The armor structure consists of absorbing layers that effectively reduce the force of the explosion and minimize damage. Grants +10 to Armor");
        $kraken->setModifier(15);
        $kraken->setCost(100);

        return $kraken;
    }

    /**
     * @return \App\Entity\Armor
     */
    private function setMedusa(): Armor
    {
        $medusa = new Armor();
        $medusa->setName("Medusa");
        $medusa->setDescription("Medusa is an advanced armor that not only protects against missiles, but also actively disorients enemy guidance systems. The armor uses special electromagnetic wave emitters that disrupt the operation of guidance warheads, causing missiles to miss their targets. Grants +25 to Armor");
        $medusa->setModifier(30);
        $medusa->setCost(200);

        return $medusa;
    }

    /**
     * @return \App\Entity\Armor
     */
    private function setTitan(): Armor
    {
        $titan = new Armor();
        $titan->setName("Titan");
        $titan->setDescription("Titan is the heaviest of the missile armors, designed for units that must withstand the heaviest fire. This armor features reinforced, high-density layers that can withstand even the most devastating missile attacks. Grants +45 Armor");
        $titan->setModifier(45);
        $titan->setCost(400);

        return $titan;
    }
}
