<?php


namespace App\Services;


use App\Repositories\FoodRepository;
use Illuminate\Http\Request;

class FoodService
{
    protected $food_repository;
    public function __construct(FoodRepository $food_repository)
    {
        $this->food_repository = $food_repository;
    }

    public function save(Request $request)
    {
        return $this->food_repository->save($request);
    }

    public function getAll()
    {
        return $this->food_repository->getAll();
    }
}
