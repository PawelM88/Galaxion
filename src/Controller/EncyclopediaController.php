<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\ArmorRepository;
use App\Repository\CockpitRepository;
use App\Repository\DefenceSystemRepository;
use App\Repository\EnergyShieldRepository;
use App\Repository\EnergyWeaponRepository;
use App\Repository\EngineRepository;
use App\Repository\RocketWeaponRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EncyclopediaController extends AbstractController
{
    #[Route('/encyclopedia', name: 'encyclopedia')]
    public function index(
        ArmorRepository $armorRepository,
        CockpitRepository $cockpitRepository,
        DefenceSystemRepository $defenceSystemRepository,
        EnergyShieldRepository $energyShieldRepository,
        EnergyWeaponRepository $energyWeaponRepository,
        EngineRepository $engineRepository,
        RocketWeaponRepository $rocketWeaponRepository
    ): Response {
        $armors = $armorRepository->findAll();
        $cockpits = $cockpitRepository->findAll();
        $defenceSystems = $defenceSystemRepository->findAll();
        $energyShields = $energyShieldRepository->findAll();
        $energyWeapons = $energyWeaponRepository->findAll();
        $engines = $engineRepository->findAll();
        $rocketWeapons = $rocketWeaponRepository->findAll();

        return $this->render('encyclopedia/index.html.twig', [
            'armors' => $armors,
            'cockpits' => $cockpits,
            'defenceSystems' => $defenceSystems,
            'energyShields' => $energyShields,
            'energyWeapons' => $energyWeapons,
            'engines' => $engines,
            'rocketWeapons' => $rocketWeapons
        ]);
    }
}
