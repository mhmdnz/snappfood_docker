<?php


namespace App\Repositories;

use App\Food;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Collection;

class FoodRepository extends AbstractRepository implements RepositoryInterface
{
    protected $model;

    protected $allowed_fields = ['id', 'title'];

    public function __construct(Food $model)
    {
        $this->model = $model;
    }

    /**
     * @return Collection
     */
    public function getMenu()
    {
        $unavailable_foods_ids = $this->getUnavailableFoods()->pluck('id');

        return $this->normalizeMenu(
            DB::table('foods')
            ->join('foods_ingredients', 'foods_ingredients.food_id', '=', 'foods.id')
            ->join('ingredients', 'ingredients.id', '=', 'foods_ingredients.ingredient_id')
            ->select(
                'foods.id',
                'foods.title',
                'ingredients.best-before as best_before'
            )
            ->whereNotIn('foods.id', $unavailable_foods_ids)
            ->orderBy('best_before')
            ->get()
            ->unique('id')
            ->reverse()
            ->values()
        );
    }

    /**
     * @return mixed
     */
    public function getUnavailableFoods()
    {

        return DB::table('foods')
            ->join('foods_ingredients', 'foods_ingredients.food_id', '=', 'foods.id')
            ->join('ingredients', 'ingredients.id', '=', 'foods_ingredients.ingredient_id')
            ->select(
                'foods.id',
                'foods.title'
            )
            ->where('ingredients.expires-at', '<=', Carbon::now())
            ->orWhere('ingredients.stock', '=', 0)
            ->distinct()
            ->get();
    }

    /**
     * @param Collection $menu
     * @return Collection
     */
    private function normalizeMenu(Collection $menu)
    {
        return $menu->transform(function ($item) {
            return collect($item)->only($this->allowed_fields);
        });
    }
}
