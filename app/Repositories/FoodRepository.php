<?php


namespace App\Repositories;

use App\Food;

class FoodRepository  extends AbstractRepository implements RepositoryInterface
{
    protected $model;
    public function __construct(Food $model)
    {
        $this->model = $model;
    }
}
