<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\DefenceSystem;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DefenceSystemFixtures extends Fixture
{
    /**
     * @param \Doctrine\Persistence\ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $cerberus = $this->setPhoenix();
        $chimera = $this->setChimera();
        $hydra = $this->setHydra();

        $manager->persist($cerberus);
        $manager->persist($chimera);
        $manager->persist($hydra);

        $manager->flush();
    }

    /**
     * @return \App\Entity\DefenceSystem
     */
    private function setPhoenix(): DefenceSystem
    {
        $phoenix = new DefenceSystem();
        $phoenix->setName("Phoenix");
        $phoenix->setDescription("The Phoenix System is an advanced defensive device that fires flares upon detecting incoming enemy missiles. Additionally, the system has ablation mirrors that effectively reflect some energy weapons. Grants -5 damage to Rocket and Energy Weapons");
        $phoenix->setModifier(5);
        $phoenix->setCost(200);

        return $phoenix;
    }

    /**
     * @return \App\Entity\DefenceSystem
     */
    private function setChimera(): DefenceSystem
    {
        $phoenix = new DefenceSystem();
        $phoenix->setName("Chimera");
        $phoenix->setDescription("In Greek mythology, the Chimera was a mythical monster that combined various beasts into one body - with the head of a lion, the tail of a snake, and the breath of a dragon. The Chimera Defense operates on the principle of adaptive defense, automatically changing its mode to adapt to threats. Its reflectors deflect missiles, and its emitters disperse incoming energy from energy weapon attacks. Grants -10 damage to Rocket and Energy Weapons");
        $phoenix->setModifier(10);
        $phoenix->setCost(400);

        return $phoenix;
    }

    /**
     * @return \App\Entity\DefenceSystem
     */
    private function setHydra(): DefenceSystem
    {
        $phoenix = new DefenceSystem();
        $phoenix->setName("Hydra");
        $phoenix->setDescription("Named after the mythical Hydra, a multi-headed monster from Greek mythology, The Hydra Shield is an advanced defense system that not only deflects incoming missiles, but also creates a dynamic protective field that can rebuild itself after each energy weapon attack. Like the heads of the Hydra, the system constantly regenerates its defense capabilities after each strike. Grants -15 damage to Rocket and Energy Weapons");
        $phoenix->setModifier(15);
        $phoenix->setCost(600);

        return $phoenix;
    }
}
