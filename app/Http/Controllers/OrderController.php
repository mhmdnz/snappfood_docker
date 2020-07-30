<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Services\FoodService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $food_service;

    public function __construct(FoodService $food_service)
    {
        $this->food_service = $food_service;
    }

    public function getMenu()
    {
        return response($this->food_service->getMenu());
    }

    public function order(OrderRequest $orderRequest)
    {
        die($orderRequest->food_id);
        return response($this->food_service->getMenu());
    }
}
