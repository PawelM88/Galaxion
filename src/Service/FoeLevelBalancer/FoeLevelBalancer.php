<?php

declare(strict_types=1);

namespace App\Service\FoeLevelBalancer;

use App\Const\SpaceshipNamesConst;
use App\Entity\Foe;

class FoeLevelBalancer
{
    /**
     * @var int
     */
    protected const EASY_LEVEL_MODIFIER = 10;

    /**
     * @var int
     */
    protected const MEDIUM_LEVEL_MODIFIER = 20;

    /**
     * @var int
     */
    protected const HARD_LEVEL_MODIFIER = 10;

    /**
     * Adjusts the stats of the given foe to match the user's new ship level.
    *
    * This method modifies the stats of the enemy (Foe) based on the enemy type and the user's ship level.
    * The method uses predefined level modifiers (easy, medium, hard) to adjust attributes such as
    * armor, energy shield, rocket weapon, energy weapon, accuracy, initiative, and defence system.
    *
    * - Pirate and Parasite enemies are adjusted with the easy level modifier.
    * - Hunter and Robot enemies are adjusted with the medium level modifier.
    * - Prophet and Insectoid enemies are adjusted with the hard level modifier.

     * @param \App\Entity\Foe $foe
     *
     * @return \App\Entity\Foe
     */
    public function balanceFoeWithNewShip(Foe $foe): Foe
    {
        $foe->setHp(400);

        switch ($foe->getName()) {
            case SpaceshipNamesConst::PIRATE:
                $foe->setArmor($foe->getArmor() + self::EASY_LEVEL_MODIFIER)
                ->setEnergyShield($foe->getEnergyShield() + self::EASY_LEVEL_MODIFIER)
                ->setRocketWeapon($foe->getRocketWeapon() + self::EASY_LEVEL_MODIFIER)
                ->setEnergyWeapon($foe->getEnergyWeapon() + self::EASY_LEVEL_MODIFIER)
                ->setAccuracy($foe->getAccuracy() + self::EASY_LEVEL_MODIFIER)
                ->setInitiative($foe->getInitiative() + self::EASY_LEVEL_MODIFIER)
                ->setDefenceSystem(5);
                break;
            case SpaceshipNamesConst::PARASITE:
                $foe->setArmor($foe->getArmor() + self::EASY_LEVEL_MODIFIER)
                ->setEnergyShield($foe->getEnergyShield() + self::EASY_LEVEL_MODIFIER)
                ->setRocketWeapon($foe->getRocketWeapon() + self::EASY_LEVEL_MODIFIER)
                ->setEnergyWeapon($foe->getEnergyWeapon() + self::EASY_LEVEL_MODIFIER)
                ->setAccuracy($foe->getAccuracy() + self::EASY_LEVEL_MODIFIER)
                ->setInitiative($foe->getInitiative() + self::EASY_LEVEL_MODIFIER)
                ->setDefenceSystem(5);
                break;
            case SpaceshipNamesConst::HUNTER:
                $foe->setRocketWeapon($foe->getRocketWeapon() + self::MEDIUM_LEVEL_MODIFIER)
                ->setEnergyWeapon($foe->getEnergyWeapon() + self::MEDIUM_LEVEL_MODIFIER)
                ->setAccuracy($foe->getAccuracy() + self::MEDIUM_LEVEL_MODIFIER)
                ->setInitiative($foe->getInitiative() + self::MEDIUM_LEVEL_MODIFIER);
                break;
            case SpaceshipNamesConst::ROBOT:
                $foe->setRocketWeapon($foe->getRocketWeapon() + self::MEDIUM_LEVEL_MODIFIER)
                ->setEnergyWeapon($foe->getEnergyWeapon() + self::MEDIUM_LEVEL_MODIFIER)
                ->setAccuracy($foe->getAccuracy() + self::MEDIUM_LEVEL_MODIFIER)
                ->setInitiative($foe->getInitiative() + self::MEDIUM_LEVEL_MODIFIER);
                break;
            case SpaceshipNamesConst::PROPHET:
                $foe->setRocketWeapon($foe->getRocketWeapon() + self::HARD_LEVEL_MODIFIER)
                ->setEnergyWeapon($foe->getEnergyWeapon() + self::HARD_LEVEL_MODIFIER);
                break;
            case SpaceshipNamesConst::INSECTOID:
                $foe->setRocketWeapon($foe->getRocketWeapon() + self::HARD_LEVEL_MODIFIER)
                ->setEnergyWeapon($foe->getEnergyWeapon() + self::HARD_LEVEL_MODIFIER);
                break;
        }

        return $foe;
    }
}
