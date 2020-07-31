<?php

use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
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
                "id" => 100,
                "title" => "stock_test_1",
                "best-before" => "2020-07-25",
                "expires-at" => "2020-09-01",
                "stock" => 0
            ],
            [
                "id" => 101,
                "title" => "stock_test_2",
                "best-before" => "2020-07-25",
                "expires-at" => "2020-09-01",
                "stock" => 0
            ]
        ]);
    }
}
