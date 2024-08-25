<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\EngineRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EngineRepository::class)]
class Engine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 500)]
    private ?string $description = null;

    /**
     * @var int[]
     */
    #[ORM\Column(type: Types::SIMPLE_ARRAY)]
    private ?array $modifier = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $cost = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return array<mixed>
     */
    public function getModifier(): array
    {
        return $this->modifier;
    }

    /**
     * @param array<mixed> $modifier
     */
    public function setModifier(array $modifier): static
    {
        $this->modifier = $modifier;

        return $this;
    }

    public function getCost(): ?int
    {
        return $this->cost;
    }

    public function setCost(int $cost): static
    {
        $this->cost = $cost;

        return $this;
    }
}
