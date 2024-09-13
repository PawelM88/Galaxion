<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use App\Entity\UserSpaceship;
use App\Service\PointsHandler\PointsHandler;
use App\Service\User\UserProvider;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;

class PointsHandlerTest extends TestCase
{
    /**
     * @var \App\Entity\UserSpaceship|\PHPUnit\Framework\MockObject\MockObject
     */
    private $userSpaceship;

    /**
     * @var \App\Service\User\UserProvider|\PHPUnit\Framework\MockObject\MockObject
     */
    private $userProvider;

    /**
     * @var \Doctrine\ORM\EntityManagerInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    private $entityManager;

    /**
     * @var \App\Service\PointsHandler\PointsHandler
     */
    private $pointsHandler;

    /**
     * Tests the calculatePointsForVictory() method for the "Easy" level.
     * Checks if the method correctly calculates the points earned (50)
     * and updates the user's spaceship's available points.
     * Makes sure the setAvailablePoints() method is called with the correct value.
     * Checks if the entity is saved in the database (persist and flush calls).
     * 
     * @return void
     */
    public function testCalculatePointsForVictoryEasyLevel()
    {
        // Arrange
        $this->userSpaceship->expects($this->once())
            ->method('getAvailablePoints')
            ->willReturn(100);
        $this->userSpaceship->expects($this->once())
            ->method('setAvailablePoints')
            ->with(150);

        $this->entityManager->expects($this->once())
            ->method('persist')->with($this->userSpaceship);
        $this->entityManager->expects($this->once())
            ->method('flush');

        // Act
        $earnedPoints = $this->pointsHandler->calculatePointsForVictory('Easy');

        // Assert
        $this->assertEquals(50, $earnedPoints);
    }

    /**
     * Tests the calculatePointsForVictory() method for an unknown level (e.g. "Hello").
     * Checks if the method returns 0 points for an unknown level.
     * Makes sure that the user's ship points are not changing.
     * Checks if the entity is saved in the database (persist and flush calls).
     * 
     * @return void
     */
    public function testCalculatePointsForVictoryUnknownLevel()
    {
        // Arrange
        $this->userSpaceship->expects($this->once())
            ->method('getAvailablePoints')
            ->willReturn(100);
        $this->userSpaceship->expects($this->once())
            ->method('setAvailablePoints')
            ->with(100);

        $this->entityManager->expects($this->once())
            ->method('persist')->with($this->userSpaceship);
        $this->entityManager->expects($this->once())
            ->method('flush');

        // Act
        $earnedPoints = $this->pointsHandler->calculatePointsForVictory('Hello');

        // Assert
        $this->assertEquals(0, $earnedPoints);
    }

    /**
     * Sets up common dependencies and mocks before each test.
     * Creates mocks for UserSpaceship, UserProvider and EntityManager.
     * Initializes PointsHandler with mocked dependencies.
     * 
     * @return void
     */
    protected function setUp(): void
    {
        /** @var \App\Service\User\UserProvider|\PHPUnit\Framework\MockObject\MockObject $userProvider */
        $this->userProvider = $this->createMock(UserProvider::class);

        /** @var \Doctrine\ORM\EntityManagerInterface|\PHPUnit\Framework\MockObject\MockObject $entityManager */
        $this->entityManager = $this->createMock(EntityManagerInterface::class);

        $this->userSpaceship = $this->createMock(UserSpaceship::class);
        $this->userProvider->method('getUserSpaceship')->willReturn($this->userSpaceship);

        $this->pointsHandler = new PointsHandler($this->userProvider, $this->entityManager);
    }
}
