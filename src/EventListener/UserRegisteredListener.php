<?php

declare(strict_types=1);

namespace App\EventListener;

use App\Entity\UserSpaceship;
use App\Event\UserRegisteredEvent;
use Doctrine\ORM\EntityManagerInterface;

class UserRegisteredListener
{
    /**
     * @var int
     */
    protected const DEFAULT_STARTING_POINTS = 100;

    /**
     * @param \Doctrine\ORM\EntityManagerInterface $entityManager
     */
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {
    }

    /**
     * Assigns default attributes to a newly registered user, including a default spaceship
     * and a set amount of starting points. The user and spaceship data are persisted to the database.
     *
     * @param \App\Event\UserRegisteredEvent $event
     *
     * @return void
     */
    public function assignDefaultAttributesToUser(UserRegisteredEvent $event): void
    {
        $user = $event->getUser();
        $defaultSpaceship = $event->getDefaultSpaceship();

        $userSpaceship = new UserSpaceship();
        $userSpaceship
            ->setUser($user)
            ->setSpaceship($defaultSpaceship)
            ->setAvailablePoints(self::DEFAULT_STARTING_POINTS);

        $this->entityManager->persist($userSpaceship);
        $this->entityManager->flush();
    }
}
