<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UserSpaceshipRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserSpaceshipRepository::class)]
class UserSpaceship
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Spaceship $spaceship = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $availablePoints = null;

    #[ORM\ManyToOne]
    private ?Cockpit $cockpit = null;

    #[ORM\ManyToOne]
    private ?EnergyWeapon $energyWeapon = null;

    #[ORM\ManyToOne]
    private ?RocketWeapon $rocketWeapon = null;

    #[ORM\ManyToOne]
    private ?Engine $engine = null;

    #[ORM\ManyToOne]
    private ?Armor $armor = null;

    #[ORM\ManyToOne]
    private ?EnergyShield $energyShield = null;

    #[ORM\ManyToOne]
    private ?DefenceSystem $defenceSystem = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getSpaceship(): ?Spaceship
    {
        return $this->spaceship;
    }

    public function setSpaceship(?Spaceship $spaceship): static
    {
        $this->spaceship = $spaceship;

        return $this;
    }

    public function getCockpit(): ?Cockpit
    {
        return $this->cockpit;
    }

    public function setCockpit(?Cockpit $cockpit): static
    {
        $this->cockpit = $cockpit;

        return $this;
    }

    public function getEnergyWeapon(): ?EnergyWeapon
    {
        return $this->energyWeapon;
    }

    public function setEnergyWeapon(?EnergyWeapon $energyWeapon): static
    {
        $this->energyWeapon = $energyWeapon;

        return $this;
    }

    public function getRocketWeapon(): ?RocketWeapon
    {
        return $this->rocketWeapon;
    }

    public function setRocketWeapon(?RocketWeapon $rocketWeapon): static
    {
        $this->rocketWeapon = $rocketWeapon;

        return $this;
    }

    public function getEngine(): ?Engine
    {
        return $this->engine;
    }

    public function setEngine(?Engine $engine): static
    {
        $this->engine = $engine;

        return $this;
    }

    public function getArmor(): ?Armor
    {
        return $this->armor;
    }

    public function setArmor(?Armor $armor): static
    {
        $this->armor = $armor;

        return $this;
    }

    public function getEnergyShield(): ?EnergyShield
    {
        return $this->energyShield;
    }

    public function setEnergyShield(?EnergyShield $energyShield): static
    {
        $this->energyShield = $energyShield;

        return $this;
    }

    public function getDefenceSystem(): ?DefenceSystem
    {
        return $this->defenceSystem;
    }

    public function setDefenceSystem(?DefenceSystem $defenceSystem): static
    {
        $this->defenceSystem = $defenceSystem;

        return $this;
    }

    public function getAvailablePoints(): ?int
    {
        return $this->availablePoints;
    }

    public function setAvailablePoints(int $availablePoints): static
    {
        $this->availablePoints = $availablePoints;

        return $this;
    }
}
