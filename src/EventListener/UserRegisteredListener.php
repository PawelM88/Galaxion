<?php

declare(strict_types=1);

namespace App\EventListener;

use App\Entity\UserSpaceship;
use App\Event\UserRegisteredEvent;
use App\Repository\SpaceshipRepository;
use Doctrine\ORM\EntityManagerInterface;

class UserRegisteredListener
{
    /**
     * @var string
     */
    protected const DEFAULT_SPACESHIP_NAME = "Helios X-21";

    /**
     * @var int
     */
    protected const DEFAULT_STARTING_POINTS = 100;

    /**
     * @param \Doctrine\ORM\EntityManagerInterface $entityManager
     */
    public function __construct(
        private EntityManagerInterface $entityManager,
        private SpaceshipRepository $spaceshipRepository
    ) {
    }

    /**
     * @param \App\Event\UserRegisteredEvent $event
     *
     * @return void
     */
    public function assignDefaultAttributesToUser(UserRegisteredEvent $event): void
    {
        $user = $event->getUser();
        $defaultSpaceship = $this->spaceshipRepository->findOneByName(self::DEFAULT_SPACESHIP_NAME);

        $userSpaceship = new UserSpaceship();
        $userSpaceship
            ->setUser($user)
            ->setSpaceship($defaultSpaceship)
            ->setAvailablePoints(self::DEFAULT_STARTING_POINTS);

        $this->entityManager->persist($userSpaceship);
        $this->entityManager->flush();
    }
}
