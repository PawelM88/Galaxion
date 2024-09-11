<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\UserSpaceship;
use App\Form\BattleCalculationType;
use App\Repository\FoeRepository;
use App\Service\BattleCalculation\BattleCalculation;
use App\Service\BattleDescription\BattleDescription;
use App\Service\User\UserProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * @param \App\Service\BattleCalculation\BattleCalculation $battleCalculation
     */
    public function __construct(
        private UserProvider $userProvider,
        private FoeRepository $foeRepository,
        private BattleDescription $battleDescription,
        private BattleCalculation $battleCalculation
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
        return $this->handleFight([self::PIRATE, self::PARASITE], 'Easy');
    }

    #[Route('/medium', name: 'medium')]
    public function mediumFight(): Response
    {
        return $this->handleFight([self::HUNTER, self::ROBOT], 'Medium');
    }

    #[Route('/hard', name: 'hard')]
    public function hardFight(): Response
    {
        return $this->handleFight([self::INSECTOID, self::PROPHET], 'Hard');
    }

    #[Route('/fight', name: 'fight', methods: ['POST'])]
    public function fight(Request $request): Response
    {
        $form = $this->createForm(BattleCalculationType::class);
        $form->handleRequest($request);

        $battleSpaceshipData = $form->getData();

        $result = $this->battleCalculation->calculateBattleResult($battleSpaceshipData);

        return $this->render('battle_system/battle_stats.html.twig', [
            'roundNumber' => $result['battleStats']['round'],
            'userVictory' => $result['battleStats']['userVictory'],
            'userSpaceship' => $result['userSpaceship'],
            'foeSpaceship' => $result['foeSpaceship'],
        ]);
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
     * @param string $level
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    private function handleFight(array $foes, string $level): Response
    {
        $userSpaceship = $this->userProvider->getUserSpaceship();
        $modules = $this->getModules($userSpaceship);
        $foeName = $foes[array_rand($foes)];
        $foe = $this->foeRepository->findOneByName($foeName);
        $form = $this->createForm(BattleCalculationType::class, null, [
            'action' => $this->generateUrl('battle_fight'),
            'method' => 'POST',
        ]);

        return $this->render('battle_system/fight.html.twig', [
            'userOwnedSpaceship' => $userSpaceship->getSpaceship(),
            'modules' => $modules,
            'foe' => $foe,
            'description' => $this->battleDescription->getRandomDescription(),
            'form' => $form,
            'level' => $level
        ]);
    }
}
