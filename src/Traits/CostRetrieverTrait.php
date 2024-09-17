<?php

declare(strict_types=1);

namespace App\Traits;

trait CostRetrieverTrait
{
    /**
     * Retrieves a list of module costs from the database.
     * Each element in the returned array contains the module's ID and its cost.
     *
     * @return array<int, array{id: int, cost: int}>
     */
    public function getCost(): array
    {
        return $this->createQueryBuilder('e')
            ->select('e.id, e.cost')
            ->getQuery()
            ->getScalarResult();
    }

    /**
     * Retrieves a list of modifier ids from the database.
     * Each element in the returned array contains the modifier ID and its entity ID.
     *
     * @return array<int, array{id: int, cost: int}>
     */
    public function getModifier(): array
    {
        return $this->createQueryBuilder('e')
            ->select('e.id, e.modifier')
            ->getQuery()
            ->getScalarResult();
    }
}
