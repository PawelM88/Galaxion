<?php declare(strict_types=1); 

namespace App\Entity;

use App\Repository\CockpitRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CockpitRepository::class)]
class Cockpit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;    

    #[ORM\Column(type: Types::SIMPLE_ARRAY)]
    private ?array $modifier = [];

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

    public function getModifier(): array
    {
        return $this->modifier;
    }

    public function setModifier(array $modifier): static
    {
        $this->modifier = $modifier;

        return $this;
    }
}
