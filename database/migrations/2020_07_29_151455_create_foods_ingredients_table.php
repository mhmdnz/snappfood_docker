<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodsIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods_ingredients', function (Blueprint $table) {
            $table->bigInteger('food_id')->unsigned();
            $table->bigInteger('ingredient_id')->unsigned();
            $table->foreign('food_id')->references('id')->on('foods')->cascadeOnDelete();
            $table->foreign('ingredient_id')->references('id')->on('ingredients')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foods_ingredients');
    }
}
