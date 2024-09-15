# Battle Calculation System

## Overview

The Battle Calculation System in Galaxion handles the logic for combat between the user's spaceship and a foe.<br>
The outcome is determined by various factors such as spaceship statistics, equipped modules, and random attack rolls.<br>
This system includes detailed calculations for attack and defense, and determines the winner based on the ship's remaining hit points (HP).

## Key Components

### 1. Battle Calculation Service

The `BattleCalculation` service is responsible for running the battle simulation. It processes the data for both the user's ship and the opponent, performs attack rolls, applies damage, and determines the winner.

Key Methods:
- `calculateBattleResult()`: This method orchestrates the entire battle, handling each round, switching between attacker and defender, and calculating the final outcome.
- `prepareSpaceshipData()`: Prepares and adjusts the statistics of both the user's and foe's spaceships, including HP, armor, shields, and weapons.
- `performAttack()`: Calculates the result of each attack, determining whether it hits or misses, and applying damage based on weapons and defenses.
- `calculateInitiative()`: Decides which spaceship attacks first, based on the initiative stat.

### 2. Controller: BattleSystemController
The `BattleSystemController` handles the presentation and logic flow for battles. It provides the user interface for initiating battles and displays battle results to the player. Depending on the selected difficulty level, it sets up the foe and initiates the battle calculation.

Key Methods:

- `easyFight()`, `mediumFight()`, `hardFight()`: Routes that set up and handle battles on different difficulty levels.
- `fight()`: The main method for handling the actual battle process, receiving form input and invoking the `BattleCalculation` service.
- `battleStats()`: Displays the result of the battle, including statistics such as rounds fought, damage dealt, and points earned.

## Detailed Process

### 1. Initiating a Battle

Battles are initiated by navigating to one of the battle difficulty routes (`/battle/easy`, `/battle/medium`, `/battle/hard`). The user selects a difficulty level, and the controller randomly assigns an enemy ship based on the difficulty.

- Easy Difficulty: Random enemies from a set of less challenging opponents (e.g., Pirate, Parasite).
- Medium Difficulty: Tougher foes such as Hunters and Robots.
- Hard Difficulty: The most difficult enemies, such as Insectoids and Prophets.

```php
Skopiuj kod
#[Route('/easy', name: 'easy')]
public function easyFight(): Response
{
    return $this->handleFight([SpaceshipNamesConst::PIRATE, SpaceshipNamesConst::PARASITE], 'Easy');
}
```

### 2. Battle Rounds
Each battle is divided into rounds. In each round, one ship attacks while the other defends. The ship with the higher initiative attacks first. The process continues until one ship's HP reaches zero.

Key Mechanics:
- Initiative: The ship with the higher initiative attacks first.
- Attack Rolls: Each attack roll is based on the attacker's accuracy stat. If the attack hits, the total damage is calculated using the ship’s weapons (missile and energy).
- Defence: The defender reduces incoming damage using its armor, energy shields, and defense systems.

```php
$battleParticipants = $this->calculateInitiative($userSpaceship, $foeSpaceship);
$attacker = $battleParticipants['attacker'];
$defender = $battleParticipants['defender'];
```

### 3. Attack and Damage Calculation
Each attack is processed using the performAttack() method. It checks if the attack hits based on accuracy, and if successful, calculates the damage using the ship's weapons. Damage is divided into two types:

- Missile Damage: Reduced by the opponent's armor and defense systems.
- Energy Damage: Reduced by the opponent's energy shields and defense systems.<br>

The damage is then applied to the defender's HP. If the HP drops to zero, the battle ends.

```php
$attackDetails = $this->performAttack($attacker, $defender);
$totalAttack = $attackDetails['totalAttack'];

if ($totalAttack > 0) {
    $defender['hp'] -= $totalAttack;
}
```

### 4. Post-Battle Report
After the battle ends, the player is presented with a detailed report of the fight, including:

- The number of rounds fought.
- The HP remaining for both ships.
- The number of successful and missed attacks.
- Damage dealt, divided by missile and energy types.
- Damage received, categorized by attack type.

The result is stored in the session and displayed using the battleStats() method.

```php
$session->set('battle_result', [
    'round' => $result['battleStats']['round'],
    'userVictory' => $result['battleStats']['userVictory'],
    'userSpaceship' => $result['userSpaceship'],
    'foeSpaceship' => $result['foeSpaceship'],
    'earnedPoints' => $earnedPoints ?? null
]);
```

### 5. Victory and Points

If the player wins the battle, they are awarded points based on the difficulty level. The `PointsHandler` service calculates the appropriate points reward, which can later be used to purchase upgrades for the player's spaceship.

```php
$earnedPoints = $this->pointsHandler->calculatePointsForVictory($battleSpaceshipData['level']);
```
