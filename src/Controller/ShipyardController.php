<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Spaceship;
use App\Entity\UserSpaceship;
use App\Form\UserSpaceshipType;
use App\Repository\UserSpaceshipRepository;
use App\Service\Ship\ComponentDataManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/shipyard', name: 'shipyard_')]
class ShipyardController extends AbstractController
{
    /**
     * @param \App\Repository\UserSpaceshipRepository $userSpaceship
     * @param \Doctrine\ORM\EntityManagerInterface $entityManager
     * @param \App\Service\Ship\ComponentDataManager $componentDataManager
     */
    public function __construct(   
        private UserSpaceshipRepository $userSpaceship,
        private EntityManagerInterface $entityManager,
        private ComponentDataManager $componentDataManager
    ) {
    }

    #[Route('/', name: 'index')]
    public function index(): Response
    {
        $userSpaceship = new UserSpaceship();
        $form = $this->createForm(UserSpaceshipType::class, $userSpaceship);
        $spaceship = $this->getSpaceshipData();

        $costOfAllComponents = $this->componentDataManager->getCostOfAllComponents();
        $modifierOfAllComponents = $this->componentDataManager->getModifiersOfAllComponents();

        if ($form->isSubmitted() && $form->isValid()) {
            $this->updateShip($this->entityManager);
        }

        return $this->render('shipyard/index.html.twig', [
            'form' => $form->createView(),
            'costOfAllComponents' => $costOfAllComponents,
            'modifierOfAllComponents' => $modifierOfAllComponents,
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
     * @return Spaceship|null
     */
    private function getSpaceshipData(): ?Spaceship
    {
        $userId = $this->getUser()->getId();
        $userSpaceship = $this->userSpaceship->findOneByUserId($userId);

        return $userSpaceship->getSpaceship();
    }
}
