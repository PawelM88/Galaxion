<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\UserSpaceship;
use App\Form\UserSpaceshipType;
use App\Repository\UserSpaceshipRepository;
use App\Service\Spaceship\ComponentDataManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/shipyard', name: 'shipyard_')]
class ShipyardController extends AbstractController
{
    /**
     * @param \App\Repository\UserSpaceshipRepository $userSpaceshipRepository
     * @param \Doctrine\ORM\EntityManagerInterface $entityManager
     * @param \App\Service\Spaceship\ComponentDataManager $componentDataManager
     */
    public function __construct(   
        private UserSpaceshipRepository $userSpaceshipRepository,
        private EntityManagerInterface $entityManager,
        private ComponentDataManager $componentDataManager
    ) {
    }

    #[Route('/', name: 'index')]
    public function index(Request $request): Response
    {
        $userSpaceship = $this->getUserSpaceship();
        $form = $this->createForm(UserSpaceshipType::class, $userSpaceship);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {            
            $remainingPoints = $request->request->get('remainingPoints');
            $userSpaceship->setAvailablePoints((int) $remainingPoints);

            $this->updateShip($userSpaceship);

            $this->addFlash('success', 'Spaceship upgraded successfully!');

            return $this->redirectToRoute('shipyard_index');
        }
    
        $spaceship = $this->getUserSpaceship()->getSpaceship();
        $userAvailablePoints = $this->getUserSpaceship()->getAvailablePoints();
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

    #[Route('/update', name: 'update')]
    public function updateShip(UserSpaceship $userSpaceship): void
    {
        $entityManager = $this->entityManager;

        $entityManager->persist($userSpaceship);
        $entityManager->flush();
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
