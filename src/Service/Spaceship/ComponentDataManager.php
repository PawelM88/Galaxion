<?php

declare(strict_types=1);

namespace App\Service\Spaceship;

use App\Repository\ArmorRepository;
use App\Repository\CockpitRepository;
use App\Repository\DefenceSystemRepository;
use App\Repository\EnergyShieldRepository;
use App\Repository\EnergyWeaponRepository;
use App\Repository\EngineRepository;
use App\Repository\RocketWeaponRepository;

class ComponentDataManager
{
    /**
     * @param \App\Repository\ArmorRepository $armorRepository
     * @param \App\Repository\CockpitRepository $cockpitRepository
     * @param \App\Repository\DefenceSystemRepository $defenceSystemRepository
     * @param \App\Repository\EnergyShieldRepository $energyShieldRepository
     * @param \App\Repository\EnergyWeaponRepository $energyWeaponRepository
     * @param \App\Repository\EngineRepository $engineRepository
     * @param \App\Repository\RocketWeaponRepository $rocketWeaponRepository
     */
    public function __construct(
        private ArmorRepository $armorRepository,
        private CockpitRepository $cockpitRepository,
        private DefenceSystemRepository $defenceSystemRepository,
        private EnergyShieldRepository $energyShieldRepository,
        private EnergyWeaponRepository $energyWeaponRepository,
        private EngineRepository $engineRepository,
        private RocketWeaponRepository $rocketWeaponRepository
    ) {
    }

    /**
     * @return array<mixed>
     */
    public function getCostOfAllComponents(): array
    {
        $armorCosts = $this->armorRepository->getCost();
        $cockpitCosts = $this->cockpitRepository->getCost();
        $defenceSystemCosts = $this->defenceSystemRepository->getCost();
        $energyShieldCosts = $this->energyShieldRepository->getCost();
        $energyWeaponCosts = $this->energyWeaponRepository->getCost();
        $engineCosts = $this->engineRepository->getCost();
        $rocketCosts = $this->rocketWeaponRepository->getCost();

        return array_merge(
            $armorCosts,
            $cockpitCosts,
            $defenceSystemCosts,
            $energyShieldCosts,
            $energyWeaponCosts,
            $engineCosts,
            $rocketCosts
        );
    }

    /**
     * @return array<mixed>
     */
    public function getModifiersOfAllComponents(): array
    {
        $armorModifiers = $this->armorRepository->getModifier();
        $cockpitModifiers = $this->cockpitRepository->getModifier();
        $defenceSystemModifiers = $this->defenceSystemRepository->getModifier();
        $energyShieldModifiers = $this->energyShieldRepository->getModifier();
        $energyWeaponModifiers = $this->energyWeaponRepository->getModifier();
        $engineModifiers = $this->engineRepository->getModifier();
        $rocketModifiers = $this->rocketWeaponRepository->getModifier();

        return array_merge(
            $armorModifiers,
            $cockpitModifiers,
            $defenceSystemModifiers,
            $energyShieldModifiers,
            $energyWeaponModifiers,
            $engineModifiers,
            $rocketModifiers
        );
    }
}
