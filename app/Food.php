<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';
    protected $fillable = ['title'];

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'foods_ingredients');
    }
}
