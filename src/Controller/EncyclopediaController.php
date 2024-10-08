<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\ArmorRepository;
use App\Repository\CockpitRepository;
use App\Repository\DefenceSystemRepository;
use App\Repository\EnergyShieldRepository;
use App\Repository\EnergyWeaponRepository;
use App\Repository\EngineRepository;
use App\Repository\FoeRepository;
use App\Repository\RocketWeaponRepository;
use App\Repository\SpaceshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EncyclopediaController extends AbstractController
{
    #[Route('/encyclopedia', name: 'encyclopedia', methods: ['GET'])]
    public function index(
        ArmorRepository $armorRepository,
        CockpitRepository $cockpitRepository,
        DefenceSystemRepository $defenceSystemRepository,
        EnergyShieldRepository $energyShieldRepository,
        EnergyWeaponRepository $energyWeaponRepository,
        EngineRepository $engineRepository,
        RocketWeaponRepository $rocketWeaponRepository,
        SpaceshipRepository $spaceshipRepository,
        FoeRepository  $foeRepository
    ): Response {
        $armors = $armorRepository->findAll();
        $cockpits = $cockpitRepository->findAll();
        $defenceSystems = $defenceSystemRepository->findAll();
        $energyShields = $energyShieldRepository->findAll();
        $energyWeapons = $energyWeaponRepository->findAll();
        $engines = $engineRepository->findAll();
        $rocketWeapons = $rocketWeaponRepository->findAll();
        $spaceships = $spaceshipRepository->findAll();
        $foes = $foeRepository->findAll();

        return $this->render('encyclopedia/index.html.twig', [
            'armors' => $armors,
            'cockpits' => $cockpits,
            'defenceSystems' => $defenceSystems,
            'energyShields' => $energyShields,
            'energyWeapons' => $energyWeapons,
            'engines' => $engines,
            'rocketWeapons' => $rocketWeapons,
            'spaceships' => $spaceships,
            'foes' => $foes
        ]);
    }
}
