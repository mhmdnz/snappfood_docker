<?php

namespace Tests\Unit;

use App\Console\Commands\AddStockCommand;
use App\Services\IngredientService;
use PHPUnit\Framework\TestCase;

class CheckAddStockCommandTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testIncreaseStock()
    {
        $ingredient_collection = $this->getIngredientCollection();
        $addStockCommand = new AddStockCommand($this->getIngredientServiceMock($ingredient_collection));
        $addStockCommand->handle();

        $this->assertEquals(
            json_encode($ingredient_collection),
            '[{"title":"Butter","stock":4},{"title":"Butter","stock":2}]'
        );
    }

    private function getIngredientServiceMock($ingredient_collection)
    {
        $mock_ingredient_service = \Mockery::mock(IngredientService::class)
            ->makePartial();
        $mock_ingredient_service->shouldReceive('getAll')->andReturn($ingredient_collection);

        return $mock_ingredient_service;
    }

    private function getIngredientCollection()
    {
        $first_obj = new class {
            public $title = 'Butter';
            public $stock = 0;
            public function save() {
                return true;
            }
        };

        $sec_obj = new class {
            public $title = 'Butter';
            public $stock = 2;
            public function save() {
                return true;
            }
        };

        return collect([&$first_obj, &$sec_obj]);
    }
}
