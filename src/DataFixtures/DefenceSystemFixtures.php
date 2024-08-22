<?php declare(strict_types=1); 

namespace App\DataFixtures;

use App\Entity\DefenceSystem;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DefenceSystemFixtures extends Fixture
{
    /**     
     * @param \Doctrine\Persistence\ObjectManager $manager
     * 
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $phoenix = $this->setPhoenix();
        $cerberus = $this->setCerberus();
                
        $manager->persist($phoenix);
        $manager->persist($cerberus);
        
        $manager->flush();
    }

    /**     
     * @return \App\Entity\DefenceSystem
     */
    private function setPhoenix(): DefenceSystem
    {
        $phoenix = new DefenceSystem();
        $phoenix->setName("Phoenix");
        $phoenix->setDescription("The Phoenix system is an advanced defensive device that fires flares when detecting incoming enemy missiles. These flares, emitting intense light and heat, effectively disorient missile guidance systems, causing them to lose their target and detonate far from the unit. Grants -10 to damage from rockets");
        $phoenix->setModifier(10);
        $phoenix->setCost(400);

        return $phoenix;
    }

    /**     
     * @return \App\Entity\DefenceSystem
     */
    private function setCerberus(): DefenceSystem
    {
        $cerberus = new DefenceSystem();
        $cerberus->setName("Cerberus");
        $cerberus->setDescription("The Cerberus system is a group of autonomous combat drones that are launched into space and search for an enemy to stick to. Using electro-tools, they systematically destroy enemy ships, dealing additional damage to them each turn. Grants +15 damage");
        $cerberus->setModifier(15);
        $cerberus->setCost(400);

        return $cerberus;
    }
}