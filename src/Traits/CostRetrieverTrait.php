<?php

declare(strict_types=1);

namespace App\Traits;

trait CostRetrieverTrait
{
    /**     
     * @return array
     */
    public function getCost(): array
    {
        return $this->createQueryBuilder('e')
            ->select('e.id, e.cost')
            ->getQuery()
            ->getScalarResult();
    }
}