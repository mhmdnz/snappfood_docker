<?php


namespace App\Services;

use Illuminate\Support\Facades\DB;

class OrderService
{
    protected $food_service;
    protected $ingredient_service;
    public function __construct(FoodService $food_service, IngredientService $ingredient_service)
    {
        $this->food_service = $food_service;
        $this->ingredient_service = $ingredient_service;
    }

    public function saveOrder($food_id):bool
    {
        $food = $this->food_service->getWith($food_id, ['ingredients']);
        try {
            DB::transaction(function () use($food){
                $food->ingredients->each(function ($ingredient){
                    $ingredient->stock -= 1;
                    $ingredient->save();
                });
            });
            return true;
        } catch (\PDOException $exception) {
            return false;
        }
    }
}
