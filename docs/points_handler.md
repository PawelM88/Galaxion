# PointsHandler Service

## Overview

The PointsHandler service in the Galaxion manages the awarding of points to players based on the outcome of battles.<br>
After a victorious battle, the player's points are updated according to the difficulty level of the battle.<br>
These points can later be used to purchase upgrades and modules for the player's spaceship.

## Key Functionality

### 1. Points Award Calculation
The `calculatePointsForVictory()` method calculates how many points the player earns based on the difficulty level of the battle. The available levels and their corresponding point values are:
- Easy: 50 points
- Medium: 100 points
- Hard: 150 points

This method is called after the battle is won, and it adds the earned points to the player's current points balance.

```php
$earnedPoints = match ($level) {
    self::EASY_LEVEL => 50,
    self::MEDIUM_LEVEL => 100,
    self::HARD_LEVEL => 150,
    default => 0,
};
```

### 2. Updating Player Points
Once the points for victory have been calculated, the `PointsHandler` updates the user's spaceship with the newly earned points. This is done by retrieving the player's current points and adding the newly earned points to it.

```php
Skopiuj kod
$userSpaceship->setAvailablePoints($userSpaceship->getAvailablePoints() + $earnedPoints);
$this->entityManager->persist($userSpaceship);
$this->entityManager->flush();
```

## Integration with Battle System
The `PointsHandler` service is tightly integrated with the Battle Calculation System. After the battle concludes and the player is determined to be victorious, the `PointsHandler` is invoked to reward the player with points based on the difficulty level.

For example, after a successful battle:
- The difficulty level is passed to the `calculatePointsForVictory()` method.
- Points are calculated and added to the player's spaceship.
- The updated points balance is persisted in the database.
