<?php

namespace App\Entity;

use App\Repository\FoesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FoesRepository::class)]
class Foes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $cockpit = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $energyWeapon = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $rocketWeapon = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $engine = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $armor = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $energyShield = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $defenceSystem = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCockpit(): ?int
    {
        return $this->cockpit;
    }

    public function setCockpit(int $cockpit): static
    {
        $this->cockpit = $cockpit;

        return $this;
    }

    public function getEnergyWeapon(): ?int
    {
        return $this->energyWeapon;
    }

    public function setEnergyWeapon(int $energyWeapon): static
    {
        $this->energyWeapon = $energyWeapon;

        return $this;
    }

    public function getRocketWeapon(): ?int
    {
        return $this->rocketWeapon;
    }

    public function setRocketWeapon(int $rocketWeapon): static
    {
        $this->rocketWeapon = $rocketWeapon;

        return $this;
    }

    public function getEngine(): ?int
    {
        return $this->engine;
    }

    public function setEngine(int $engine): static
    {
        $this->engine = $engine;

        return $this;
    }

    public function getArmor(): ?int
    {
        return $this->armor;
    }

    public function setArmor(int $armor): static
    {
        $this->armor = $armor;

        return $this;
    }

    public function getEnergyShield(): ?int
    {
        return $this->energyShield;
    }

    public function setEnergyShield(int $energyShield): static
    {
        $this->energyShield = $energyShield;

        return $this;
    }

    public function getDefenceSystem(): ?int
    {
        return $this->defenceSystem;
    }

    public function setDefenceSystem(int $defenceSystem): static
    {
        $this->defenceSystem = $defenceSystem;

        return $this;
    }
}
