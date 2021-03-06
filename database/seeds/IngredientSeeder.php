<?php

use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredients')->insert([
            [
            "title" => "Ham",
            "best-before" => "2020-07-25",
            "expires-at" => "2020-07-27",
            "stock" => 3
            ], [
            "title" => "Cheese",
            "best-before" => "2020-07-08",
            "expires-at" => "2020-07-13",
            "stock" => 3
        ], [
            "title" => "Bread",
            "best-before" => "2020-07-25",
            "expires-at" => "2020-07-27",
            "stock" => 3
        ], [
            "title" => "Butter",
            "best-before" => "2020-07-25",
            "expires-at" => "2020-07-27",
            "stock" => 3
        ], [
            "title" => "Bacon",
            "best-before" => "2020-07-25",
            "expires-at" => "2020-07-27",
            "stock" => 3
        ], [
            "title" => "Eggs",
            "best-before" => "2020-07-25",
            "expires-at" => "2020-07-27",
            "stock" => 3
        ], [
            "title" => "Mushrooms",
            "best-before" => "2020-07-25",
            "expires-at" => "2020-07-27",
            "stock" => 3
        ], [
            "title" => "Sausage",
            "best-before" => "2020-07-25",
            "expires-at" => "2020-07-27",
            "stock" => 3
        ], [
            "title" => "Hotdog Bun",
            "best-before" => "2020-07-25",
            "expires-at" => "2020-07-27",
            "stock" => 3
        ], [
            "title" => "Ketchup",
            "best-before" => "2020-07-25",
            "expires-at" => "2020-07-27",
            "stock" => 3
        ], [
            "title" => "Mustard",
            "best-before" => "2020-07-25",
            "expires-at" => "2020-07-27",
            "stock" => 3
        ], [
            "title" => "Lettuce",
            "best-before" => "2020-07-25",
            "expires-at" => "2020-07-27",
            "stock" => 3
        ], [
            "title" => "Tomato",
            "best-before" => "2020-07-25",
            "expires-at" => "2020-07-27",
            "stock" => 3
        ], [
            "title" => "Cucumber",
            "best-before" => "2020-07-25",
            "expires-at" => "2020-07-27",
            "stock" => 3
        ], [
            "title" => "Beetroot",
            "best-before" => "2020-07-25",
            "expires-at" => "2020-07-27",
            "stock" => 3
        ], [
            "title" => "Salad Dressing",
            "best-before" => "2020-07-06",
            "expires-at" => "2020-07-07",
            "stock" => 3
            ]
        ]);
    }
}
