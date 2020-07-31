<?php

namespace Tests\Unit;

use App\Console\Commands\AddStockCommand;
use App\Ingredient;
use App\Services\IngredientService;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use PHPUnit\Framework\TestCase;

class CheckAddStockCommandTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testIncreaseWithDb()
    {
        $mock_ingredient_service = \Mockery::mock(IngredientService::class)
            ->makePartial();
        $ingredient_collections = $this->getIngredientCollection();
        $mock_ingredient_service->shouldReceive('getAll')->andReturn($ingredient_collections);

        $addStockCommand = new AddStockCommand($mock_ingredient_service);
        $addStockCommand->handle();

        $this->assertEquals(
            json_encode($ingredient_collections),
            '[{"title":"Butter","stock":4},{"title":"Butter","stock":2}]'
        );
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
