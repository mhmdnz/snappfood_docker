<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FoodTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testFoodCount()
    {
        $response = $this->get('/api/food');
        $foods = collect(json_decode($response->getContent()));

        $this->assertEquals($foods->count(), 4);
        $response->assertStatus(200);
    }

    protected function setUp():void
    {
        parent::setUp();
        $this->artisan('migrate:refresh');
        $this->artisan('db:seed');
    }
}
