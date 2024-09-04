<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Spaceship;
use App\Entity\UserSpaceship;
use App\Form\UserSpaceshipType;
use App\Repository\ArmorRepository;
use App\Repository\CockpitRepository;
use App\Repository\DefenceSystemRepository;
use App\Repository\EnergyShieldRepository;
use App\Repository\EnergyWeaponRepository;
use App\Repository\EngineRepository;
use App\Repository\RocketWeaponRepository;
use App\Repository\UserSpaceshipRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/shipyard', name: 'shipyard_')]
class ShipyardController extends AbstractController
{
    /**
     * @param \App\Repository\ArmorRepository $armorRepository
     * @param \App\Repository\CockpitRepository $cockpitRepository
     * @param \App\Repository\DefenceSystemRepository $defenceSystemRepository
     * @param \App\Repository\EnergyShieldRepository $energyShieldRepository
     * @param \App\Repository\EnergyWeaponRepository $energyWeaponRepository
     * @param \App\Repository\EngineRepository $engineRepository
     * @param \App\Repository\RocketWeaponRepository $rocketWeaponRepository     
     * @param \App\Repository\UserSpaceshipRepository $userSpaceship
     * @param \Doctrine\ORM\EntityManagerInterface $entityManager
     */
    public function __construct(
        private ArmorRepository $armorRepository,
        private CockpitRepository $cockpitRepository,
        private DefenceSystemRepository $defenceSystemRepository,
        private EnergyShieldRepository $energyShieldRepository,
        private EnergyWeaponRepository $energyWeaponRepository,
        private EngineRepository $engineRepository,
        private RocketWeaponRepository $rocketWeaponRepository,        
        private UserSpaceshipRepository $userSpaceship,
        private EntityManagerInterface $entityManager,
    ) {
    }

    #[Route('/', name: 'index')]
    public function index(): Response
    {
        $userSpaceship = new UserSpaceship();
        $form = $this->createForm(UserSpaceshipType::class, $userSpaceship);
        $spaceship = $this->getSpaceshipData();

        $costOfAllComponents = $this->getCostOfAllComponents();

        if ($form->isSubmitted() && $form->isValid()) {
            $this->updateShip($this->entityManager);
        }

        return $this->render('shipyard/index.html.twig', [
            'form' => $form->createView(),
            'costOfAllComponents' => $costOfAllComponents,
            'spaceship' => $spaceship
        ]);

        // TODO: addFlash() and redirectToRoute()
    }

    #[Route('/update', name: 'update')]
    public function updateShip(EntityManagerInterface $entityManager): void
    {
        // TODO: $entityManager->persist() and $entityManager->flush();
    }

    /**
     * @return array<mixed>
     */
    private function getCostOfAllComponents(): array
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
     * @return Spaceship|null
     */
    private function getSpaceshipData(): ?Spaceship
    {
        $userId = $this->getUser()->getId();
        $userSpaceship = $this->userSpaceship->findOneByUserId($userId);

        return $userSpaceship->getSpaceship();
    }
}
