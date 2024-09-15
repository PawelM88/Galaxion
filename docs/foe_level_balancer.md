# Foe Level Balancer

## Overview
The Foe Level Balancer in the Galaxion adjusts the stats of enemies (foes) to better match the advanced ships that players can acquire.<br> This is important because some of the new ships have significantly higher stats compared to the default enemies, creating an imbalance. The Foe Level Balancer ensures that foes remain competitive by increasing their stats based on predefined difficulty modifiers.

## Key Components

### 1. Foe Level Modifier
The `FoeLevelBalancer` service modifies the stats of enemies depending on their type and the user's spaceship level. This helps to maintain a balanced gameplay experience even when players upgrade to stronger ships.

The following modifiers are applied based on the difficulty level:
- Easy Level Modifier: +10 to relevant stats
- Medium Level Modifier: +20 to relevant stats
- Hard Level Modifier: +10 to relevant stats

Enemy Types and Modifiers:
- Pirate and Parasite: Adjusted with the Easy Level Modifier.
- Hunter and Robot: Adjusted with the Medium Level Modifier.
- Prophet and Insectoid: Adjusted with the Hard Level Modifier.

```php
$foe->setArmor($foe->getArmor() + self::EASY_LEVEL_MODIFIER)
    ->setEnergyShield($foe->getEnergyShield() + self::EASY_LEVEL_MODIFIER)
    ->setRocketWeapon($foe->getRocketWeapon() + self::EASY_LEVEL_MODIFIER)
    ->setEnergyWeapon($foe->getEnergyWeapon() + self::EASY_LEVEL_MODIFIER)
    ->setAccuracy($foe->getAccuracy() + self::EASY_LEVEL_MODIFIER)
    ->setInitiative($foe->getInitiative() + self::EASY_LEVEL_MODIFIER)
    ->setDefenceSystem(5);
```

### 2. Stat Adjustments

For each enemy type, different stats are modified based on their difficulty level. The stats adjusted include:

- HP: Set to a fixed value of 400 for all balanced foes.
- Armor: Adjusted by the corresponding level modifier.
- Energy Shield: Adjusted by the corresponding level modifier.
- Rocket Weapon: Adjusted by the corresponding level modifier.
- Energy Weapon: Adjusted by the corresponding level modifier.
- Accuracy: Adjusted by the corresponding level modifier.
- Initiative: Adjusted by the corresponding level modifier.
- Defence System: Set to a fixed value for certain enemy types.

### 3. Balancing Based on Player's Ship
The balancer is only applied when the user has a specific new ship with very high stats, ensuring that enemies remain challenging despite the player's upgrades.