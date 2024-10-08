<?php

declare(strict_types=1);

namespace App\Controller;

use App\Const\SpaceshipNamesConst;
use App\Entity\Spaceship;
use App\Entity\UserSpaceship;
use App\Repository\SpaceshipRepository;
use App\Service\User\UserProvider;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

#[Route('/buy-new-spaceship', name: 'buy_new_spaceship_')]
class BuyNewSpaceshipController extends AbstractController
{
    /**
     * @param \App\Service\User\UserProvider $userProvider
     * @param \App\Repository\SpaceshipRepository $spaceshipRepository
     * @param \Doctrine\ORM\EntityManagerInterface $entityManager
     */
    public function __construct(
        private UserProvider $userProvider,
        private SpaceshipRepository $spaceshipRepository,
        private EntityManagerInterface $entityManager
    ) {
    }

    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(): Response
    {
        $userSpaceship = $this->userProvider->getUserSpaceship();
        $newSpaceship = $this->getNewSpaceship();
        $userAvailablePoints = $userSpaceship->getAvailablePoints();

        if (!$userSpaceship || !$newSpaceship) {
            $this->addFlash('danger', 'There was an issue retrieving your or new spaceship. Please try again later.');
            
            return $this->redirectToRoute('shipyard_index');
        }

        return $this->render('buy_new_spaceship/index.html.twig', [
            'userOwnedSpaceship' => $userSpaceship->getSpaceship(),
            'newSpaceship' => $newSpaceship,
            'userAvailablePoints' => $userAvailablePoints
        ]);
    }

    #[Route('/purchase', name: 'purchase', methods: ['POST'])]
    public function purchase(Request $request): Response
    {
        if (!$this->isCsrfTokenValid('buy_new_spaceship_token', $request->request->get('_csrf_token'))) {
            throw new AccessDeniedException('Invalid CSRF token.');
        }

        $userSpaceship = $this->userProvider->getUserSpaceship();
        $newSpaceship = $this->getNewSpaceship();
        $newSpaceshipCost = $newSpaceship->getCost();

        $this->processPurchase($userSpaceship, $newSpaceship, $newSpaceshipCost);

        $this->addFlash('success', 'New spaceship has been bought!');

        return $this->redirectToRoute('shipyard_index');
    }

    /**
     * Retrieves and returns the new spaceship entity based on a predefined constant.
     * Returns null if the spaceship is not found.
     *
     * @return \App\Entity\Spaceship|null
     */
    private function getNewSpaceship(): ?Spaceship
    {
        return $this->spaceshipRepository->findOneByName(SpaceshipNamesConst::NEW_SPACESHIP_NAME);
    }

    /**
     * Processes the purchase of a new spaceship by deducting the cost from the user's available points
     * updating the user's spaceship and saving the changes to the database.
     *
     * @param \App\Entity\UserSpaceship $userSpaceship
     * @param \App\Entity\Spaceship $newSpaceship
     * @param int $newSpaceshipCost
     *
     * @return void
     */
    private function processPurchase(UserSpaceship $userSpaceship, Spaceship $newSpaceship, int $newSpaceshipCost): void
    {
        $userRemainingPoints = $userSpaceship->getAvailablePoints() - $newSpaceshipCost;

        $userSpaceship->setSpaceship($newSpaceship);
        $userSpaceship->setAvailablePoints($userRemainingPoints);

        $this->entityManager->persist($userSpaceship);
        $this->entityManager->flush();
    }
}
