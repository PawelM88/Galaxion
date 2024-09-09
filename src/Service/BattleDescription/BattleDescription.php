<?php

declare(strict_types=1);

namespace App\Service\BattleDescription;

class BattleDescription
{
    private const DESCRIPTIONS = [
        "You are flying alone through the dark wasteland of space, near a dangerous asteroid belt. Your sensors detect an unidentified object approaching your ship quickly. You try to make contact and find out who you are dealing with, but there is no answer. Suddenly, a stream of missiles fires from the flickering shadows - the enemy does not intend to talk. There is only one way out - to prepare for battle and face the unknown enemy.",
        "You are traveling through endless space when suddenly your sensors detect a strange movement in the distance. An unknown ship appears on the horizon, which at first seems to ignore you. However, it suddenly changes course, accelerates and heads towards you. Before you can realize it, the enemy opens fire. It looks like this will not be a friendly encounter.",
        "During a routine patrol along the asteroid belt, your radars begin to pick up signals of an approaching ship. You try to find out who you are dealing with, but the hostile pulses quickly give away its intentions. In the blink of an eye, the enemy is firing its weapons, and you must be ready to fight.",
        "You are wandering through the wasteland of space when you suddenly come across an unknown ship hiding in the shadow of giant asteroids. It seems that the enemy has been waiting for you to fly into range. Before you can react, shots begin to flash from the barrels of its guns. You have no choice - you must return fire.",
        "You cut through the interstellar void as your sensors detect an object approaching rapidly. At first you think it is a civilian ship, but something about its movements worries you. Suddenly a stream of missiles flows from its sides - the enemy is not going to give you a chance to escape. Time to prepare for battle.",
        "Your journey through space was going smoothly until the sensors detect a sudden increase in energy. You wonder if it is a system failure, but a moment later an enemy ship appears on the screen. It begins to fire without warning. You must make a quick decision - fight or be destroyed.",
        "Traveling through the void of space, you notice a flickering light in the distance. As you fly closer, it turns out to be a ship with hostile intentions. Before you can respond, a series of missiles rushes towards you. The enemy does not give you time to talk - you must prepare for battle.",
        "As you cross the borders of a distant planetary system, your radars detect an enemy ship. You suspend your actions for a moment, trying to assess its intentions, but a sudden burst of cannon fire leaves no illusions. It is time to return fire.",
        "Among the nebulae, where the starlight does not reach, the shape of a battleship emerges. At first, you are not sure of its intentions, but when the first missiles hit your ship's shields, you know that combat is inevitable.",
        "Your warning system begins to emit loud signals as the unknown ship crosses the borders of your safe zone. Scanners indicate that the enemy is arming its cannons. Battle is coming, and you must take up the gauntlet.",
        "In the distance, you spot a giant gas planet, its rings shimmering in the light of a nearby star. Your sensors begin to warn of an approaching enemy flotilla. Before you can escape, several enemy fighters are sent your way. Time to prepare to defend yourself.",
        "A shimmering portal suddenly opens in the middle of an asteroid field. From within it emerges a mysterious ship that you do not recognize on any known maps. Before you can make contact, the ship opens fire. Surprised, you prepare to react immediately.",
        "Flying past the shattered planetoid, you notice something is wrong. An enemy ship emerges from the shadows, using its mass to hide. As you begin your escape maneuver, its guns are already targeting your engines. You must fight before you are destroyed.",
        "You are wandering near the swirling disk of a black hole when an enemy ship suddenly emerges from its depths. Somehow it has managed to survive in extreme conditions and is now heading straight for you. Your only option is to fight.",
        "In the silence of space, your systems suddenly begin to pick up on the presence of an enemy flotilla. Without time to hide, you see the enemy units approaching and forming a battle formation. Your chances are slim, but you must face the coming clash."
    ];

    /**
     * @return string
     */
    public function getRandomDescription(): string
    {
        return self::DESCRIPTIONS[array_rand(self::DESCRIPTIONS)];
    }
}
