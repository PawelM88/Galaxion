<?php declare(strict_types=1); 

namespace App\DataFixtures;

use App\Entity\Cockpit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CockpitFixtures extends Fixture
{
    /**     
     * @param \Doctrine\Persistence\ObjectManager $manager
     * 
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $hawkEye = $this->setHawkEye();
        $griffin = $this->setGriffin();
        $phantom = $this->setPhantom();
        
        $manager->persist($hawkEye);
        $manager->persist($griffin);
        $manager->persist($phantom);

        $manager->flush();
    }

    /**     
     * @return \App\Entity\Cockpit
     */
    private function setHawkEye(): Cockpit
    {
        $hawkEye = new Cockpit();
        $hawkEye->setName("Hawk Eye");
        $hawkEye->setDescription("The Hawk Eye cockpit features advanced optical and sensor systems that provide the pilot with a crystal clear picture of the battlefield. Aiming assist systems allow the pilot to focus more on the fight, increasing the ship's initiative. Grants +15 to Accuracy and +5 to Initiative");
        $hawkEye->setModifier([15,5]);

        return $hawkEye;
    }

    /**     
     * @return \App\Entity\Cockpit
     */
    private function setGriffin(): Cockpit
    {
        $griffin = new Cockpit();
        $griffin->setName("Griffin");
        $griffin->setDescription("Griffin is a cockpit designed for unit commanders who value a combination of excellent accuracy with maximum control over the battlefield situation. Thanks to the advanced tactical interface, the pilot can simultaneously monitor and manage the activities of multiple systems, as well as quickly respond to dynamically changing conditions. Grants +30 to Accuracy and +10 to Initiative");
        $griffin->setModifier([30, 15]);

        return $griffin;
    }

    /**     
     * @return \App\Entity\Cockpit
     */
    private function setPhantom(): Cockpit
    {
        $phantom = new Cockpit();
        $phantom->setName("Phantom");
        $phantom->setDescription("The Phantom cockpit is designed for stealth missions where surprise and precision strike are the priority. Specially designed screens and interfaces respond to the pilot's slightest movements, allowing for rapid adaptation to unpredictable situations. Grants +45 to Accuracy and +30 to Initiative");
        $phantom->setModifier([45, 30]);

        return $phantom;
    }
}