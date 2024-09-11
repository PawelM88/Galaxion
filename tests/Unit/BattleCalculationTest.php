<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use App\Service\BattleCalculation\BattleCalculation;
use PHPUnit\Framework\TestCase;

class BattleCalculationTest extends TestCase
{
    /**
     * Tests a scenario where the user wins the battle.
     * Checks if the battle result indicates a user victory.
     * Checks if the number of rounds is greater than 0.
     * Checks if the foe has 0 or less HP after the battle.
     * 
     * @return void
     */
    public function testUserVictory(): void
    {
        // Arrange
        $battleCalc = new BattleCalculation();
        $battleSpaceshipData = [
            'user_hp' => '100',
            'user_armor' => '30',
            'user_energyShield' => '30',
            'user_rocketWeapon' => '35',
            'user_energyWeapon' => '35',
            'user_defenceSystem' => '0',
            'user_accuracy' => '70',
            'user_initiative' => '15',

            'module_armor' => '10',
            'module_energyShield' => '10',
            'module_rocketWeapon' => '10',
            'module_energyWeapon' => '10',
            'module_defenceSystem' => '10',
            'module_accuracy' => '10',
            'module_initiative' => '5',

            'foe_hp' => '50',
            'foe_armor' => '20',
            'foe_energyShield' => '20',
            'foe_rocketWeapon' => '45',
            'foe_energyWeapon' => '45',
            'foe_defenceSystem' => '5',
            'foe_accuracy' => '50',
            'foe_initiative' => '10'
        ];

        // Act
        $result = $battleCalc->calculateBattleResult($battleSpaceshipData);

        // Assert
        $this->assertTrue($result['battleStats']['userVictory'], 'User should have won the battle.');
        $this->assertGreaterThan(0, $result['battleStats']['round'], 'Rounds should be greater than 0.');
        $this->assertLessThanOrEqual(0, $result['foeSpaceship']['hp'], 'Foe spaceship should have 0 or less HP after battle.');
    }

    /**
     * Tests a scenario where the foe wins the battle.
     * Checks if the battle result indicates a user failure.
     * Checks if the number of rounds is greater than 0.
     * Checks if the user has 0 or less HP after the battle.
     * 
     * @return void
     */
    public function testFoeVictory(): void
    {
        // Arrange
        $battleCalc = new BattleCalculation();
        $battleSpaceshipData = [
            'user_hp' => '50',
            'user_armor' => '30',
            'user_energyShield' => '30',
            'user_rocketWeapon' => '35',
            'user_energyWeapon' => '35',
            'user_defenceSystem' => '0',
            'user_accuracy' => '40',
            'user_initiative' => '15',

            'module_armor' => '10',
            'module_energyShield' => '10',
            'module_rocketWeapon' => '10',
            'module_energyWeapon' => '10',
            'module_defenceSystem' => '10',
            'module_accuracy' => '10',
            'module_initiative' => '5',

            'foe_hp' => '150',
            'foe_armor' => '50',
            'foe_energyShield' => '50',
            'foe_rocketWeapon' => '75',
            'foe_energyWeapon' => '75',
            'foe_defenceSystem' => '20',
            'foe_accuracy' => '80',
            'foe_initiative' => '30'
        ];

        // Act
        $result = $battleCalc->calculateBattleResult($battleSpaceshipData);

        // Assert
        $this->assertFalse($result['battleStats']['userVictory'], 'User should have loose the battle.');
        $this->assertGreaterThan(0, $result['battleStats']['round'], 'Rounds should be greater than 0.');
        $this->assertLessThanOrEqual(0, $result['userSpaceship']['hp'], 'User spaceship should have 0 or less HP after battle.');
    }

    /**
     * Tests the correctness of calculating the number of rounds.
     * 
     * @return void
     */
    public function testRoundsCalculation(): void
    {
        // Arrange
        $battleCalc = new BattleCalculation();
        $battleSpaceshipData = [
            'user_hp' => '200',
            'user_armor' => '0',
            'user_energyShield' => '0',
            'user_rocketWeapon' => '25',
            'user_energyWeapon' => '25',
            'user_defenceSystem' => '0',
            'user_accuracy' => '100',
            'user_initiative' => '100',

            'module_armor' => '0',
            'module_energyShield' => '0',
            'module_rocketWeapon' => '0',
            'module_energyWeapon' => '0',
            'module_defenceSystem' => '0',
            'module_accuracy' => '0',
            'module_initiative' => '0',

            'foe_hp' => '150',
            'foe_armor' => '0',
            'foe_energyShield' => '0',
            'foe_rocketWeapon' => '0',
            'foe_energyWeapon' => '0',
            'foe_defenceSystem' => '0',
            'foe_accuracy' => '10',
            'foe_initiative' => '10'
        ];

        // Act
        $result = $battleCalc->calculateBattleResult($battleSpaceshipData);

        // Assert
        $this->assertEquals(3, $result['battleStats']['round'], 'Rounds should be calculated correctly.');
    }
}
