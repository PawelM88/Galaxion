<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use App\Traits\CostRetrieverTrait;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use PHPUnit\Framework\TestCase;

class CostRetrieverTraitTest extends TestCase
{
    public function testGetCostReturnsCorrectData()
    {
        // Arrange        
        $queryBuilder = $this->createMock(QueryBuilder::class);
        $query = $this->createMock(Query::class);

        $queryBuilder->expects($this->once())
            ->method('select')
            ->with('e.id, e.cost')
            ->willReturn($queryBuilder);

        $queryBuilder->expects($this->once())
            ->method('getQuery')
            ->willReturn($query);

        $query->method('getScalarResult')
            ->willReturn([
                ['id' => 1, 'cost' => 100],
                ['id' => 2, 'cost' => 200],
                ['id' => 3, 'cost' => 400],
            ]);

        $repository = new class($queryBuilder) {
            use CostRetrieverTrait;            

            public function __construct(private QueryBuilder $queryBuilder)
            {
            }

            public function createQueryBuilder($alias)
            {
                return $this->queryBuilder;
            }
        };

        // Act
        $result = $repository->getCost();

        // Assert
        $this->assertCount(3, $result);
        $this->assertEquals(100, $result[0]['cost']);
        $this->assertEquals(200, $result[1]['cost']);
        $this->assertEquals(400, $result[2]['cost']);
    }
}
