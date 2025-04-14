<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Restaurant;

class FavoriteTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->seed(\Database\Seeders\AreasTableSeeder::class);
        $this->seed(\Database\Seeders\GenresTableSeeder::class);
        $this->seed(\Database\Seeders\RestaurantsTableSeeder::class);
    }

    /**
     * @test
     * お気に入り機能テスト
     * いいねアイコンを押下することによって、いいねした飲食店として登録することができるかテスト
     */
    public function can_favorite_restaurant(){
        $restaurant = Restaurant::first();
        $response = $this->actingAs($this->user)->post('/favorites/' . $restaurant->id);

        $response->assertStatus(200);

        $this->assertDatabaseHas('favorites', [
            'user_id' => $this->user->id,
            'restaurant_id' => $restaurant->id,
        ]);
    }
}