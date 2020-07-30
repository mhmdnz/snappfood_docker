<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Services\FoodService;
use App\Services\OrderService;

class OrderController extends Controller
{
    protected $food_service;
    protected $order_service;

    public function __construct(FoodService $food_service, OrderService $order_service)
    {
        $this->food_service = $food_service;
        $this->order_service = $order_service;
    }

    public function getMenu()
    {
        return response($this->food_service->getMenu());
    }

    public function order(OrderRequest $orderRequest)
    {
        return response([
            "order_status" => $this->order_service->saveOrder($orderRequest->food_id)
        ]);
    }
}
