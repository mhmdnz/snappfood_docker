<?php

namespace App\Http\Middleware;

use App\Food;
use App\Services\FoodService;
use Closure;

class CheckOrderMiddleware
{
    protected $food_service;
    public function __construct(FoodService $food_service)
    {
        $this->food_service = $food_service;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /**
         * @var Food $food
         */
        $food = $this->food_service->get($request->food_id);
        if (!$food)
            return response(['message' => 'Food Not Found']);

        $unavailable_foods = $this->food_service->getUnAvailableFoods();
        if ($unavailable_foods->pluck('id')->contains($food->id))
            return response(['message' => 'The Food Is UnAvailable Now']);

        return $next($request);
    }
}
