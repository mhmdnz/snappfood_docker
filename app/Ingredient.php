<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = ['title', 'stock', 'best-before', 'expires-at'];

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'foods_ingredients');
    }
}
