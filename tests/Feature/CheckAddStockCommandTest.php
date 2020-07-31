<?php

namespace Tests\Feature;

use App\Console\Commands\AddStockCommand;
use App\Ingredient;
use App\Services\IngredientService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CheckAddStockCommandTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testIncreaseStock()
    {

        $ingredient_example = Ingredient::find(100);
        $this->assertEquals($ingredient_example->stock, 0);
        $this->assertDatabaseHas('ingredients',             [
            "id" => 100,
            "title" => "stock_test_1",
            "best-before" => "2020-07-25",
            "expires-at" => "2020-09-01",
            "stock" => 0
        ]);

        $addStockCommand = new AddStockCommand(resolve(IngredientService::class));
        $addStockCommand->handle();

        $ingredient_example = Ingredient::find(100);
        $this->assertEquals($ingredient_example->stock, 4);
        $this->assertDatabaseHas('ingredients',             [
            "id" => 100,
            "title" => "stock_test_1",
            "best-before" => "2020-07-25",
            "expires-at" => "2020-09-01",
            "stock" => 4
        ]);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:refresh');
        $this->artisan('db:seed');
    }

}
