<?php declare(strict_types=1); 

namespace App\Entity;

use App\Repository\SpaceshipRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpaceshipRepository::class)]
class Spaceship
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: true)]
    private ?Armor $armor = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $class = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: true)]
    private ?Cockpit $cockpit = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: true)]
    private ?DefenceSystem $defenceSystem = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: true)]
    private ?EnergyShield $energyShield = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: true)]
    private ?EnergyWeapon $energyWeapon = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: true)]
    private ?Engine $engine = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: true)]
    private ?RocketWeapon $rocketWeapon = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getClass(): ?string
    {
        return $this->class;
    }

    public function setClass(string $class): static
    {
        $this->class = $class;

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

    public function getDefenceSystem(): ?DefenceSystem
    {
        return $this->defenceSystem;
    }

    public function setDefenceSystem(?DefenceSystem $defenceSystem): static
    {
        $this->defenceSystem = $defenceSystem;

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

    public function getEnergyWeapon(): ?EnergyWeapon
    {
        return $this->energyWeapon;
    }

    public function setEnergyWeapon(?EnergyWeapon $energyWeapon): static
    {
        $this->energyWeapon = $energyWeapon;

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

    public function getRocketWeapon(): ?RocketWeapon
    {
        return $this->rocketWeapon;
    }

    public function setRocketWeapon(?RocketWeapon $rocketWeapon): static
    {
        $this->rocketWeapon = $rocketWeapon;

        return $this;
    }
}