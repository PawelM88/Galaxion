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
        return $this->handleFight([self::PIRATE, self::PARASITE], 'battle_system/levels/easyFight.html.twig');
    }

    #[Route('/medium', name: 'medium')]
    public function mediumFight(): Response
    {
        return $this->handleFight([self::HUNTER, self::ROBOT], 'battle_system/levels/mediumFight.html.twig');
    }

    #[Route('/hard', name: 'hard')]
    public function hardFight(): Response
    {
        return $this->handleFight([self::INSECTOID, self::PROPHET], 'battle_system/levels/hardFight.html.twig');
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
        return [
            'Cockpit' => $userSpaceship->getCockpit()?->getModifier(),
            'Engine' => $userSpaceship->getEngine()?->getModifier(),
            'EnergyWeapon' => $userSpaceship->getEnergyWeapon()?->getModifier(),
            'RocketWeapon' => $userSpaceship->getRocketWeapon()?->getModifier(),
            'EnergyShield' => $userSpaceship->getEnergyShield()?->getModifier(),
            'Armor' => $userSpaceship->getArmor()?->getModifier(),
            'DefenceSystem' => $userSpaceship->getDefenceSystem()?->getModifier()
        ];
    }

    /**
     * @param array<mixed> $foes
     * @param string $template
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    private function handleFight(array $foes, string $template): Response
    {
        $userSpaceship = $this->userProvider->getUserSpaceship();
        $modules = $this->getModules($userSpaceship);
        $foeName = $foes[array_rand($foes)];
        $foe = $this->foeRepository->findOneByName($foeName);

        return $this->render($template, [
            'userOwnedSpaceship' => $userSpaceship->getSpaceship(),
            'modules' => $modules,
            'foe' => $foe,
            'description' => $this->battleDescription->getRandomDescription(),
        ]);
    }
}
