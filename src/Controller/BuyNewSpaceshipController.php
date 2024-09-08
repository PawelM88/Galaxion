<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Spaceship;
use App\Entity\UserSpaceship;
use App\Repository\SpaceshipRepository;
use App\Repository\UserSpaceshipRepository;
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
     * @var string
     */
    protected const NEW_SPACESHIP_NAME = "Vanguard K-3";

    /**
     * @param \App\Repository\UserSpaceshipRepository $userSpaceshipRepository
     * @param \App\Service\User\UserProvider $userProvider
     * @param \App\Repository\SpaceshipRepository $spaceshipRepository
     * @param \Doctrine\ORM\EntityManagerInterface $entityManager
     */
    public function __construct(
        private UserSpaceshipRepository $userSpaceshipRepository,
        private UserProvider $userProvider,
        private SpaceshipRepository $spaceshipRepository,
        private EntityManagerInterface $entityManager
    ) {}

    #[Route('/', name: 'index')]
    public function index(): Response
    {
        $userSpaceship = $this->userProvider->getUserSpaceship();
        $newSpaceship = $this->getNewSpaceship();
        $userAvailablePoints = $userSpaceship->getAvailablePoints();

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
     * @return \App\Entity\Spaceship|null
     */
    private function getNewSpaceship(): ?Spaceship
    {
        return $this->spaceshipRepository->findOneByName(self::NEW_SPACESHIP_NAME);
    }

    /**
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
