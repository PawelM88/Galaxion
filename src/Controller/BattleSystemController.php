<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\UserSpaceship;
use App\Repository\FoeRepository;
use App\Service\BattleDescription\BattleDescription;
use App\Service\User\UserProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/battle', name: 'battle_')]
class BattleSystemController extends AbstractController
{
    /**
     * @var string
     */
    private const PIRATE = "Neptune's Corsairs";

    /**
     * @var string
     */
    private const PARASITE = "Space Parasites";

    /**
     * @var string
     */
    private const HUNTER = "Bounty Hunters";

    /**
     * @var string
     */
    private const ROBOT = "Rebel Robots";

    /**
     * @var string
     */
    private const INSECTOID = "Insectoids";

    /**
     * @var string
     */
    private const PROPHET = "Prophet Cruiser";

    /**
     * @param \App\Service\User\UserProvider $userProvider
     * @param \App\Repository\FoeRepository $foeRepository
     * @param \App\Service\BattleDescription\BattleDescription $battleDescription
     */
    public function __construct(
        private UserProvider $userProvider,
        private FoeRepository $foeRepository,
        private BattleDescription $battleDescription
    ) {
    }

    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('battle_system/index.html.twig');
    }

    #[Route('/easy', name: 'easy')]
    public function easyFight(): Response
    {
        $userSpaceship = $this->userProvider->getUserSpaceship();
        $modules = $this->getModules($userSpaceship);
        $foeName = rand(0, 1) == 0 ? self::PIRATE : self::PARASITE;
        $foe = $this->foeRepository->findOneByName($foeName);

        return $this->render('battle_system/levels/easyFight.html.twig', [
            'userOwnedSpaceship' => $userSpaceship->getSpaceship(),
            'modules' => $modules,
            'foe' => $foe,
            'description' => $this->battleDescription->getRandomDescription()
        ]);
    }

    #[Route('/medium', name: 'medium')]
    public function mediumFight(): Response
    {
        $userSpaceship = $this->userProvider->getUserSpaceship();
        $modules = $this->getModules($userSpaceship);
        $foeName = rand(0, 1) == 0 ? self::HUNTER : self::ROBOT;
        $foe = $this->foeRepository->findOneByName($foeName);

        return $this->render('battle_system/levels/mediumFight.html.twig', [
            'userOwnedSpaceship' => $userSpaceship->getSpaceship(),
            'modules' => $modules,
            'foe' => $foe,
            'description' => $this->battleDescription->getRandomDescription()
        ]);
    }

    #[Route('/hard', name: 'hard')]
    public function hardFight(): Response
    {
        $userSpaceship = $this->userProvider->getUserSpaceship();
        $modules = $this->getModules($userSpaceship);
        $foeName = rand(0, 1) == 0 ? self::INSECTOID : self::PROPHET;
        $foe = $this->foeRepository->findOneByName($foeName);

        return $this->render('battle_system/levels/hardFight.html.twig', [
            'userOwnedSpaceship' => $userSpaceship->getSpaceship(),
            'modules' => $modules,
            'foe' => $foe,
            'description' => $this->battleDescription->getRandomDescription()
        ]);
    }

    #[Route('/fight', name: 'fight')]
    public function fight(): Response
    {
        return $this->render('battle_system/index.html.twig');
    }

    /**
     * @param \App\Entity\UserSpaceship $userSpaceship
     *
     * @return array<mixed>
     */
    private function getModules(UserSpaceship $userSpaceship): array
    {
        $cockpit = array('Cockpit' => $userSpaceship->getCockpit() ? $userSpaceship->getCockpit()->getModifier() : null);
        $engine = array('Engine' => $userSpaceship->getEngine() ? $userSpaceship->getEngine()->getModifier() : null);
        $energyWeapon = array('EnergyWeapon' => $userSpaceship->getEnergyWeapon() ? $userSpaceship->getEnergyWeapon()->getModifier() : null);
        $rocketWeapon = array('RocketWeapon' => $userSpaceship->getRocketWeapon() ? $userSpaceship->getRocketWeapon()->getModifier() : null);
        $energyShield = array('EnergyShield' => $userSpaceship->getEnergyShield() ? $userSpaceship->getEnergyShield()->getModifier() : null);
        $armor = array('Armor' => $userSpaceship->getArmor() ? $userSpaceship->getArmor()->getModifier() : null);
        $defenceSystem = array('DefenceSystem' => $userSpaceship->getDefenceSystem() ? $userSpaceship->getDefenceSystem()->getModifier() : null);

        return array_merge($cockpit, $engine, $energyWeapon, $rocketWeapon, $energyShield, $armor, $defenceSystem);
    }
}
