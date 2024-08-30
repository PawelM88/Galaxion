<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Spaceship;
use App\Form\UserSpaceshipType;
use App\Repository\ArmorRepository;
use App\Repository\CockpitRepository;
use App\Repository\DefenceSystemRepository;
use App\Repository\EnergyShieldRepository;
use App\Repository\EnergyWeaponRepository;
use App\Repository\EngineRepository;
use App\Repository\RocketWeaponRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/shipyard', name: 'shipyard_')]
class ShipyardController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(
        ArmorRepository $armorRepository,
        CockpitRepository $cockpitRepository,
        DefenceSystemRepository $defenceSystemRepository,
        EnergyShieldRepository $energyShieldRepository,
        EnergyWeaponRepository $energyWeaponRepository,
        EngineRepository $engineRepository,
        RocketWeaponRepository $rocketWeaponRepository,
        EntityManagerInterface $entityManager
    ): Response {
        $spaceship = new Spaceship();
        $form = $this->createForm(UserSpaceshipType::class, $spaceship);

        $costOfAllComponents = $this->getCostOfAllComponents(
            $armorRepository,
            $cockpitRepository,
            $defenceSystemRepository,
            $energyShieldRepository,
            $energyWeaponRepository,
            $engineRepository,
            $rocketWeaponRepository
        );

        if ($form->isSubmitted() && $form->isValid()) {
            $this->updateShip($entityManager);
        }

        return $this->render('shipyard/index.html.twig', [
            'form' => $form->createView(),
            'costOfAllComponents' => $costOfAllComponents

            // TODO: addFlash() and redirectToRoute()
        ]);
    }

    #[Route('/update', name: 'update')]
    public function updateShip(EntityManagerInterface $entityManager): void
    {
        // TODO: $entityManager->persist() and $entityManager->flush();
    }

    /**
     * @param \App\Repository\ArmorRepository $armorRepository
     * @param \App\Repository\CockpitRepository $cockpitRepository
     * @param \App\Repository\DefenceSystemRepository $defenceSystemRepository
     * @param \App\Repository\EnergyShieldRepository $energyShieldRepository
     * @param \App\Repository\EnergyWeaponRepository $energyWeaponRepository
     * @param \App\Repository\EngineRepository $engineRepository
     * @param \App\Repository\RocketWeaponRepository $rocketWeaponRepository
     *
     * @return array<mixed>
     */
    private function getCostOfAllComponents(
        ArmorRepository $armorRepository,
        CockpitRepository $cockpitRepository,
        DefenceSystemRepository $defenceSystemRepository,
        EnergyShieldRepository $energyShieldRepository,
        EnergyWeaponRepository $energyWeaponRepository,
        EngineRepository $engineRepository,
        RocketWeaponRepository $rocketWeaponRepository
    ): array {
        $armorCosts = $armorRepository->getCost();
        $cockpitCosts = $cockpitRepository->getCost();
        $defenceSystemCosts = $defenceSystemRepository->getCost();
        $energyShieldCosts = $energyShieldRepository->getCost();
        $energyWeaponCosts = $energyWeaponRepository->getCost();
        $engineCosts = $engineRepository->getCost();
        $rocketCosts = $rocketWeaponRepository->getCost();

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
}
