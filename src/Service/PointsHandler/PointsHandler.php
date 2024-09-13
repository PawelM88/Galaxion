<?php

declare(strict_types=1);

namespace App\Service\PointsHandler;

use App\Service\User\UserProvider;
use Doctrine\ORM\EntityManagerInterface;

class PointsHandler
{
    /**
     * @var string
     */
    protected const EASY_LEVEL = 'Easy';

    /**
     * @var string
     */
    protected const MEDIUM_LEVEL = 'Medium';

    /**
     * @var string
     */
    protected const HARD_LEVEL = 'Hard';

    /**
     * @param \App\Service\User\UserProvider $userProvider
     * @param \Doctrine\ORM\EntityManagerInterface $entityManager
     */
    public function __construct(
        private UserProvider $userProvider,
        private EntityManagerInterface $entityManager
    ) {
    }

    /**
     * Calculates victory points based on difficulty level and updates user's spaceship data.
     *
     * @param string $level
     *
     * @return int
     */
    public function calculatePointsForVictory(string $level)
    {
        $userSpaceship = $this->userProvider->getUserSpaceship();

        $earnedPoints = match ($level) {
            self::EASY_LEVEL => 50,
            self::MEDIUM_LEVEL => 100,
            self::HARD_LEVEL => 150,
            default => 0,
        };

        $userSpaceship->setAvailablePoints($userSpaceship->getAvailablePoints() + $earnedPoints);

        $this->entityManager->persist($userSpaceship);
        $this->entityManager->flush();

        return $earnedPoints;
    }
}
