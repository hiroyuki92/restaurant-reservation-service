<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Restaurant;
use App\Models\Area;
use App\Models\Genre;

class RestaurantDetailTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_retrieve_restaurant_detail()
    {
        $this->seed(\Database\Seeders\AreasTableSeeder::class);
        $this->seed(\Database\Seeders\GenresTableSeeder::class);
        $this->seed(\Database\Seeders\RestaurantsTableSeeder::class);

        $restaurant = Restaurant::first();
        $response = $this->get('/detail/' . $restaurant->id);

        $response->assertStatus(200);
        $response->assertViewIs('restaurant_detail');

        $response->assertSee($restaurant->name);
        $response->assertSee($restaurant->area->name);
        $response->assertSee($restaurant->genre->name);
        $response->assertSee($restaurant->description);
        $response->assertSee($restaurant->image_url);

        $response->assertSee('<input type="date" name="reservation_date"', false);
        $response->assertSeeInOrder([
            'Shop',
            $restaurant->name,
        ]);
        $response->assertSee('17:00');
        $response->assertSee('1人');
        $response->assertSee('予約する');
    }
}
