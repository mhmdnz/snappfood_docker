<?php

namespace App\Http\Controllers;

use App\Food;
use App\Services\FoodService;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    protected $food_service;

    public function __construct(FoodService $food_service)
    {
        $this->food_service = $food_service;
    }

    public function getAll()
    {
        return response($this->food_service->getAll());
    }
}
