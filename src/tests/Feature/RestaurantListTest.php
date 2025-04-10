<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Restaurant;
use App\Models\Area;
use App\Models\Genre;

class RestaurantListTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_retrieve_all_restaurants()
    {
        $this->seed(\Database\Seeders\AreasTableSeeder::class);
        $this->seed(\Database\Seeders\GenresTableSeeder::class);
        $this->seed(\Database\Seeders\RestaurantsTableSeeder::class);
        $response = $this->get('/');
        $response->assertStatus(200);

        $restaurants = Restaurant::all();
        $expectedCount = 20;

        $this->assertEquals($expectedCount, $restaurants->count(),
        "商品の総数が期待値と異なります。期待値: {$expectedCount}, 実際: {$restaurants->count()}");
    }
}
