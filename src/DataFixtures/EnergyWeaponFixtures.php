<?php declare(strict_types=1); 

namespace App\DataFixtures;

use App\Entity\EnergyWeapon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EnergyWeaponFixtures extends Fixture
{
    /**     
     * @param \Doctrine\Persistence\ObjectManager $manager
     * 
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $laser = $this->setLaser();
        $plasma = $this->setPlasma();
        $tachyons = $this->setTachyons();
        
        $manager->persist($laser);
        $manager->persist($plasma);
        $manager->persist($tachyons);

        $manager->flush();
    }

    /**     
     * @return \App\Entity\EnergyWeapon
     */
    private function setLaser(): EnergyWeapon
    {
        $laser = new EnergyWeapon();
        $laser->setName("Laser");
        $laser->setDescription("The laser is an energy weapon system that emits an extremely concentrated beam of high-powered light. With precise aiming and lightning-fast speed, this laser is ideal for precise attacks on key points of enemy units. Grants +10 to Energy Weapon");
        $laser->setModifier(10);
        $laser->setCost(100);

        return $laser;
    }

    /**     
     * @return \App\Entity\EnergyWeapon
     */
    private function setPlasma(): EnergyWeapon
    {
        $plasma = new EnergyWeapon();
        $plasma->setName("Plasma");
        $plasma->setDescription("A powerful plasma cannon that fires balls of super-heated plasma capable of melting ship hulls and causing massive explosions. The generated Plasma is unstable, allowing each shot to penetrate enemy shields and deal significant damage. Grants +25 to Energy Weapon");
        $plasma->setModifier(25);
        $plasma->setCost(200);

        return $plasma;
    }

    /**     
     * @return \App\Entity\EnergyWeapon
     */
    private function setTachyons(): EnergyWeapon
    {
        $tachyons = new EnergyWeapon();
        $tachyons->setName("Tachyons");
        $tachyons->setDescription("Tachyons are advanced energy weapons that fire a lightning-like beam of tachyons. Tachyons can paralyze enemy systems, disabling electronics, and immobilizing vehicles or other units for a short period of time, giving an advantage on the battlefield. Grants +45 Energy Weapon");
        $tachyons->setModifier(45);
        $tachyons->setCost(400);

        return $tachyons;
    }
}