<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\UserSpaceship;
use App\Form\UserSpaceshipType;
use App\Service\Spaceship\ComponentDataManager;
use App\Service\User\UserProvider;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/shipyard', name: 'shipyard_')]
class ShipyardController extends AbstractController
{
    /**
     * @param \App\Service\User\UserProvider $userProvider
     * @param \Doctrine\ORM\EntityManagerInterface $entityManager
     * @param \App\Service\Spaceship\ComponentDataManager $componentDataManager
     */
    public function __construct(
        private UserProvider $userProvider,
        private EntityManagerInterface $entityManager,
        private ComponentDataManager $componentDataManager
    ) {
    }

    #[Route('/', name: 'index', methods: ['GET', 'POST'])]
    public function index(Request $request): Response
    {
        $userSpaceship = $this->userProvider->getUserSpaceship();
        $form = $this->createForm(UserSpaceshipType::class, $userSpaceship);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $remainingPoints = $request->request->get('remainingPoints');
            $userSpaceship->setAvailablePoints((int) $remainingPoints);

            $this->updateShip($userSpaceship);

            $this->addFlash('success', 'Spaceship upgraded successfully!');

            return $this->redirectToRoute('shipyard_index');
        }

        $spaceship = $userSpaceship->getSpaceship();
        $userAvailablePoints = $userSpaceship->getAvailablePoints();
        $costOfAllComponents = $this->componentDataManager->getCostOfAllComponents();
        $modifierOfAllComponents = $this->componentDataManager->getModifiersOfAllComponents();

        return $this->render('shipyard/index.html.twig', [
            'form' => $form->createView(),
            'costOfAllComponents' => $costOfAllComponents,
            'modifierOfAllComponents' => $modifierOfAllComponents,
            'spaceship' => $spaceship,
            'userAvailablePoints' => $userAvailablePoints
        ]);
    }

    /**
     * Updates the user's spaceship by persisting the changes to the database and saving the updated spaceship entity.
     *
     * @param \App\Entity\UserSpaceship $userSpaceship
     *
     * @return void
     */
    private function updateShip(UserSpaceship $userSpaceship): void
    {
        $entityManager = $this->entityManager;

        $entityManager->persist($userSpaceship);
        $entityManager->flush();
    }
}
