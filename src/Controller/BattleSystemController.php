<?php declare(strict_types=1); 

namespace App\Controller;

use App\Entity\UserSpaceship;
use App\Repository\UserSpaceshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/battle', name: 'battle_')]
class BattleSystemController extends AbstractController
{
    /**
     * @param \App\Repository\UserSpaceshipRepository $userSpaceshipRepository
     */
    public function __construct(
        private UserSpaceshipRepository $userSpaceshipRepository
    ) {}

    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('battle_system/index.html.twig');
    }

    #[Route('/easy', name: 'easy')]
    public function easyFight(): Response
    {
        $userSpaceship = $this->getUserSpaceship();
        $modules = $this->getModules($userSpaceship);

        return $this->render('battle_system/levels/easyFight.html.twig', [
            'userOwnedSpaceship' => $userSpaceship->getSpaceship(),
            'modules' => $modules
        ]);
    }

    #[Route('/medium', name: 'medium')]
    public function mediumFight(): Response
    {
        $userSpaceship = $this->getUserSpaceship();
        $modules = $this->getModules($userSpaceship);

        return $this->render('battle_system/levels/mediumFight.html.twig', [
            'userOwnedSpaceship' => $userSpaceship->getSpaceship(),
            'modules' => $modules
        ]);
    }

    #[Route('/hard', name: 'hard')]
    public function hardFight(): Response
    {
        $userSpaceship = $this->getUserSpaceship();
        $modules = $this->getModules($userSpaceship);

        return $this->render('battle_system/levels/hardFight.html.twig', [
            'userOwnedSpaceship' => $userSpaceship->getSpaceship(),
            'modules' => $modules
        ]);
    }

    /**
     * @return \App\Entity\UserSpaceship
     */
    private function getUserSpaceship(): UserSpaceship
    {
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        $userId = $user->getId();

        return $this->userSpaceshipRepository->findOneByUserId($userId);
    }

    /**
     * @param \App\Entity\UserSpaceship $userSpaceship
     * 
     * @return array<mixed>
     */
    private function getModules(UserSpaceship $userSpaceship): array
    {
        $cockpit = array('cockpitModule' => $userSpaceship->getCockpit());
        $engine = array('engineModule' => $userSpaceship->getEngine());
        $energyWeapon = array('energyWeaponModule' => $userSpaceship->getEnergyWeapon());
        $rocketWeapon = array('rocketWeaponModule' => $userSpaceship->getRocketWeapon());
        $energyShield = array('energyShieldModule' => $userSpaceship->getEnergyShield());
        $armor = array('armorModule' => $userSpaceship->getArmor());
        $defenceSystem = array('defenceSystemModule' => $userSpaceship->getDefenceSystem());

        return array_merge($cockpit, $engine, $energyWeapon, $rocketWeapon, $energyShield, $armor, $defenceSystem);
    }
}
