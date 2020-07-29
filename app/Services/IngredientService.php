<?php


namespace App\Services;


use App\Repositories\FoodRepository;
use App\Repositories\IngredientRepository;
use Illuminate\Http\Request;

class IngredientService
{
    protected $ingredient_repository;
    public function __construct(IngredientRepository $ingredient_repository)
    {
        $this->ingredient_repository = $ingredient_repository;
    }

    public function save(Request $request)
    {
        return $this->ingredient_repository->save($request);
    }

    public function getAll()
    {
        return $this->ingredient_repository->getAll();
    }
}
