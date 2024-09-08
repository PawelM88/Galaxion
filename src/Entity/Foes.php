<?php

declare(strict_types=1);

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

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $class = null;

    #[ORM\Column(length: 500)]
    private ?string $description = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $hp = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $armor = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $energyShield = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $rocketWeapon = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $energyWeapon = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $accuracy = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $initiative = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $defenceSystem = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getHp(): ?int
    {
        return $this->hp;
    }

    public function setHp(int $hp): static
    {
        $this->hp = $hp;

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

    public function getAccuracy(): ?int
    {
        return $this->accuracy;
    }

    public function setAccuracy(int $accuracy): static
    {
        $this->accuracy = $accuracy;

        return $this;
    }

    public function getInitiative(): ?int
    {
        return $this->initiative;
    }

    public function setInitiative(int $initiative): static
    {
        $this->initiative = $initiative;

        return $this;
    }
}
