<?php


namespace App\Repositories;


use App\Ingredient;

class IngredientRepository extends AbstractRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Ingredient $model)
    {
        $this->model = $model;
    }
}
