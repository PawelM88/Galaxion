<?php declare(strict_types=1); 

namespace App\Controller;

use App\Entity\UserSpaceship;
use App\Repository\SpaceshipRepository;
use App\Repository\UserSpaceshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BuyNewSpaceshipController extends AbstractController
{
    /**
     * @var string
     */
    protected const NEW_SPACESHIP_NAME = "Vanguard K-3";

    /**
     * @param \App\Repository\UserSpaceshipRepository $userSpaceshipRepository
     * @param \App\Repository\SpaceshipRepository $spaceshipRepository
     */
    public function __construct(   
        private UserSpaceshipRepository $userSpaceshipRepository,
        private SpaceshipRepository $spaceshipRepository
    ) {
    }

    #[Route('/buy-new-spaceship', name: 'buy_new_spaceship')]
    public function index(): Response
    {
        $userOwnedSpaceship = $this->getUserSpaceship()->getSpaceship();
        $newSpaceship = $this->spaceshipRepository->findOneByName(self::NEW_SPACESHIP_NAME);
        $userAvailablePoints = $this->getUserSpaceship()->getAvailablePoints();

        return $this->render('buy_new_spaceship/index.html.twig', [
            'userOwnedSpaceship' => $userOwnedSpaceship,
            'newSpaceship' => $newSpaceship,
            'userAvailablePoints' => $userAvailablePoints
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
}
