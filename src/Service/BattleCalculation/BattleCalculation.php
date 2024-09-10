<?php

declare(strict_types=1);

namespace App\Service\BattleCalculation;

class BattleCalculation
{
    public function calculateBattleResult(array $battleSpaceshipData)
    {
        $spaceshipsStats = $this->prepareSpaceshipData($battleSpaceshipData);
        $userSpaceship = $spaceshipsStats['userSpaceship'];
        $foeSpaceship = $spaceshipsStats['foeSpaceship'];

        $battleParticipants = $this->calculateInitiative($userSpaceship, $foeSpaceship);
        $attacker = $battleParticipants['attacker'];
        $defender = $battleParticipants['defender'];

        while ($userSpaceship['hp'] > 0 && $foeSpaceship['hp'] > 0) {            
            $damage = $this->performAttack($attacker, $defender);

            $defender['hp'] -= $damage;
            if ($defender['hp'] <= 0) {
                if ($defender['isUser']) {
                    $userSpaceship['hp'] = $defender['hp'];
                } else {
                    $foeSpaceship['hp'] = $defender['hp'];
                }
                break;
            }

            // Change of attacker
            list($attacker, $defender) = [$defender, $attacker];
        }
    
        if ($userSpaceship['hp'] > 0) {
            $userVictory = true;
        } else {
            $userVictory = false;
        }

        return [
            'victory' => $userVictory, // true, jeśli user wygrał
            'remainingUserHp' => $userSpaceship['hp'],
            'remainingFoeHp' => $foeSpaceship['hp']
        ];
    }

    /**
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
            'isUser' => true
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
            'isUser' => false
        ];
    
        return [
            'userSpaceship' => $userSpaceship,
            'foeSpaceship' => $foeSpaceship
        ];
    }

    /**
     * @param array<string, int> $userSpaceship
     * @param array<string, int> $foeSpaceship
     * 
     * @return array<array<string, int>>
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
     * @param array<string, int> $attacker
     * @param array<string, int> $defender
     * 
     * @return int
     */
    private function performAttack(array $attacker, array $defender): int
    {    
        $accuracyRoll = rand(0, 100);
        if ($accuracyRoll > $attacker['accuracy']) {
            return 0;
        }

        $rocketDamage = max(0, $attacker['rocketWeapon'] - $defender['armor']);

        $energyDamage = max(0, $attacker['energyWeapon'] - $defender['energyShield']);

        $damage = max(0, ($rocketDamage + $energyDamage) - $defender['defenceSystem']);

        return $damage;
    }
}
