<?php

declare(strict_types=1);

namespace App\Service\BattleCalculation;

class BattleCalculation
{
    /**
     * Calculates the battle outcome based on spaceship data.
     * 
     * @param array<string, string|bool> $battleSpaceshipData
     * 
     * @return array<string, array<string, int|bool>>
     */
    public function calculateBattleResult(array $battleSpaceshipData): array
    {
        $battleStats = array(
            'round' => 0,
            'userVictory' => true
        );

        $spaceshipsStats = $this->prepareSpaceshipData($battleSpaceshipData);
        $userSpaceship = $spaceshipsStats['userSpaceship'];
        $foeSpaceship = $spaceshipsStats['foeSpaceship'];

        $battleParticipants = $this->calculateInitiative($userSpaceship, $foeSpaceship);
        $attacker = $battleParticipants['attacker'];
        $defender = $battleParticipants['defender'];

        while ($userSpaceship['hp'] > 0 && $foeSpaceship['hp'] > 0) {
            $battleStats['round']++;

            $attackDetails = $this->performAttack($attacker, $defender);
            $totalAttack = $attackDetails['totalAttack'];

            if ($totalAttack > 0) {
                $rocketAttack = $attackDetails['rocketAttack'];
                $energyAttack = $attackDetails['energyAttack'];

                $defender['hp'] -= $totalAttack;
                $defender['damageTakenFromRockets'] += $rocketAttack;
                $defender['damageTakenFromEnergyWeapons'] += $energyAttack;
                $attacker['damageDealtByRockets'] += $rocketAttack;
                $attacker['damageDealtByEnergyWeapons'] += $energyAttack;
            } else {
                $attacker['miss']++;
            }            
            
            if ($defender['hp'] <= 0) {
                if ($defender['isUser']) {
                    $userSpaceship = $defender;
                    $foeSpaceship = $attacker;
                } else {
                    $userSpaceship = $attacker;
                    $foeSpaceship = $defender;
                }
                break;
            }

            // Change of attacker
            list($attacker, $defender) = [$defender, $attacker];            
        }
    
        if ($userSpaceship['hp'] < 0) {
            $battleStats['userVictory'] = false;            
        }

        $battleStats['round'] = ceil($battleStats['round'] / 2);

        return [
            $battleStats,
            $userSpaceship,
            $foeSpaceship
        ];
    }

    /**
     * Prepares statistics data for user and foe ships.
     * 
     * @param array<string, string> $battleSpaceshipData
     * 
     * @return array<string, array<string, int|bool>>
     */
    private function prepareSpaceshipData(array $battleSpaceshipData): array
    {
        $userSpaceship = [
            'hp' => intval($battleSpaceshipData['user_hp']),
            'armor' => intval($battleSpaceshipData['user_armor']) + intval($battleSpaceshipData['module_armor']),
            'energyShield' => intval($battleSpaceshipData['user_energyShield']) + intval($battleSpaceshipData['module_energyShield']),
            'rocketWeapon' => intval($battleSpaceshipData['user_rocketWeapon']) + intval($battleSpaceshipData['module_rocketWeapon']),
            'energyWeapon' => intval($battleSpaceshipData['user_energyWeapon']) + intval($battleSpaceshipData['module_energyWeapon']),
            'defenceSystem' => intval($battleSpaceshipData['user_defenceSystem']) + intval($battleSpaceshipData['module_defenceSystem']),
            'accuracy' => intval($battleSpaceshipData['user_accuracy']) + intval($battleSpaceshipData['module_accuracy']),
            'initiative' => intval($battleSpaceshipData['user_initiative']) + intval($battleSpaceshipData['module_initiative']),
            'isUser' => true,
            'damageTakenFromRockets' => 0,
            'damageTakenFromEnergyWeapons' => 0,
            'damageDealtByRockets' => 0,
            'damageDealtByEnergyWeapons' => 0,
            'miss' => 0
        ];
    
        $foeSpaceship = [
            'hp' => intval($battleSpaceshipData['foe_hp']),
            'armor' => intval($battleSpaceshipData['foe_armor']),
            'energyShield' => intval($battleSpaceshipData['foe_energyShield']),
            'rocketWeapon' => intval($battleSpaceshipData['foe_rocketWeapon']),
            'energyWeapon' => intval($battleSpaceshipData['foe_energyWeapon']),
            'defenceSystem' => intval($battleSpaceshipData['foe_defenceSystem']),
            'accuracy' => intval($battleSpaceshipData['foe_accuracy']),
            'initiative' => intval($battleSpaceshipData['foe_initiative']),
            'isUser' => false,
            'damageTakenFromRockets' => 0,
            'damageTakenFromEnergyWeapons' => 0,
            'damageDealtByRockets' => 0,
            'damageDealtByEnergyWeapons' => 0,
            'miss' => 0
        ];
    
        return [
            'userSpaceship' => $userSpaceship,
            'foeSpaceship' => $foeSpaceship
        ];
    }

    /**
     * Determines which spaceship attacks first based on initiative.
     * 
     * @param array<string, int> $userSpaceship
     * @param array<string, int> $foeSpaceship
     * 
     * @return array<string, array<string, int|bool>>
     */
    private function calculateInitiative(array $userSpaceship, array $foeSpaceship): array
    {
        if ($userSpaceship['initiative'] >= $foeSpaceship['initiative']) {
            return [
                'attacker' => $userSpaceship,
                'defender' => $foeSpaceship
            ];
        }
    
        return [
            'attacker' => $foeSpaceship,
            'defender' => $userSpaceship
        ];
    }

    /**
     * Performs an attack from one side to the other, taking into account hits and damage.
     * 
     * @param array<string, int> $attacker
     * @param array<string, int> $defender
     * 
     * @return array<string, int>
     */
    private function performAttack(array $attacker, array $defender): array
    {    
        $accuracyRoll = rand(0, 100);
        if ($accuracyRoll > $attacker['accuracy']) {
            return [
                'totalAttack' => 0,
                'rocketAttack' => 0,
                'energyAttack' => 0
            ];
        }

        $rocketAttack = max(0, $attacker['rocketWeapon'] - $defender['armor'] - $defender['defenceSystem']);
        $energyAttack = max(0, $attacker['energyWeapon'] - $defender['energyShield'] - $defender['defenceSystem']);
        $totalAttack = max(0, $rocketAttack + $energyAttack);

        return [
            'totalAttack' => $totalAttack,
            'rocketAttack' => $rocketAttack,
            'energyAttack' => $energyAttack
        ];
    }
}
